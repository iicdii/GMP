/*
$(function(){
  블라블라...
});
요건 jquery에서 제공하는 즉시 실행문.
옛날엔
<body onload="함수">를 작성해서 body가 로드되면 실행하도록 작성했었는데...
이 방법은 DOM 로드 실행 함수를 하나만 작성할 수 있다는 크나큰 단점... 그리고 DOM 엘리먼트에 on 관련 이벤트를 직접 넣지 않는 관행으로 인해 안쓰게됨.

$(함수)는 자바스크립트를 head에서 호출하면 DOM이 로드되기 전에 실행되버려서 $('.grade-desired') 이런걸 잡으려고 해도 body 내에 엘리먼트 없으니까 안잡히고 undefined로 되어버리기 때문에 사용하기도 하고...
캡슐화해서 변수를 지역화 하기 위해 사용한다.

(function(){
  블라블라...
})();
이걸 </body> 바로 위쪽에서 호출하면 $(펑션);과 동일한 효과를 지닌다.
이걸 즉시 실행 익명함수라고 하는데 원래는 함수(인자); 로 실행하는 함수 형태가 (함수)(인자);로도 실행할 수 있고, 함수 자리에는 익명 함수가 들어갈 수 있다는 원리로 작동하는 것.
*/
$(function(){
  // grade 계산
  function gradeCalc(options){
    // options object
    /*
    {
      requirement: '#requirement-input',
      current: '#current-element',
      need: '#need-element'
    }
    */
    var requirementEl = $(options.requirement);
    var currentEl = $(options.current);
    
    // 아래에서 잡은 이벤트가 이 함수를 통해 실행된다. 물론 호출을 하니까;
    // 첫번째 인자의 e는 이벤트 객체가 들어오게 되며 이벤트 함수에는 무조건 이게 들어온다. 브라우저의 내장된 표준 규칙이다.
    // e 이벤트 객체를 통해 무언가 조작할 수 있다. 예를들어 a 태그에 클릭 이벤트인데 클릭이 들어오면 e.preventDefault()를 통해 링크 이동을 막고 다른 행동을 취한다던지...
    function gradeKeypress(e){
      var needGrade = parseInt(requirementEl.val(), 10) - parseInt(currentEl.text(), 10);
      if(needGrade>=0) $(options.need).text(needGrade).data('needGrade', needGrade);
      gradeSum();
    }

    // keypress keyup keydown는 키보드 이벤트를 의미한다.
    // keypress는 키가 눌릴 당시, keyup은 키보드를 눌렀다가 띌 때, keydown은 눌릴 때 이벤트가 발생한다.
    // 세 개를 다 잡는 이유는 딜레이로 인해 브라우저에서 몇몇 이벤트를 놓치기 떄문이다. 보통 세 이벤트를 다 잡아줘야 실시간으로 반영됨.
    // on(jquery 문법)의 첫번째 인자는 잡을 이벤트, 두번째 인자는 실행할 함수
    requirementEl.on('keypress keyup keydown', gradeKeypress);
    currentEl.on('keypress keyup keydown', gradeKeypress);
    
    // 위 방식을 이벤트 바인딩이라고 표현하는데
    /*
    $(element).on('eventName', function(e){
      console.log('실행할 내용');
    });
    */
    // 처럼 익명함수를 넣어서 실행할 수도 있다.
    // 만약 gradeKeypress 대신 익명함수를 넣었다면 동일한 함수 실행문을 똑같이 넣어줘야 했겠지...
  }
  
  function gradeListAdder(options){
    // options object
    /*
    {
      button: '#btn-element',
      ul_list: '#ul_list-element',
      li_list: '#li_list-element'
    }
    */
    var buttonEl = $(options.btn);
    var ul_listEl = $(options.ul_list);
    var li_listEl = $(options.li_list);
    buttonEl.click(function() {
      var itemCount = (ul_listEl.children().length + 1);
      if(itemCount < 31) {
        var element = li_listEl.clone();
        element.children().children().first().val(''); // 과목 value 초기화
        element.children().children().first().next().val(''); // 학점 value 초기화
        element.children().children().last().css('display', "inline-block"); // -버튼 활성화
        element.children().children().last().prev().attr('checked', false); // check 버튼 uncheck
        ul_listEl.append(element);
      }
    });
  }
  
  // 학점 합계 표시
  // $('css 셀렉터')로 감싸면 해당 DOM 엘리먼트가 선택되어 담긴다.
  // 함수 내에 잡지 않는 이유는 캐시를 위해서.
  // 함수 내에 잡게 되면 매번 DOM 전체를 뒤져서 해당 엘리먼트를 찾게 된다.
  var gradeDesiredEl = $('.grade-desired');
  var gradeNeedEl = $('.grade-need');
  var totalDesiredEl = $('#total-desired');
  var totalNeedEl = $('#total-need');

  function gradeSum(){
    var gradeDesiredSum = 0;
    var gradeNeedSum = 0;
    
    // each(jquery 문법)는 엘리먼트 개수만큼 돌면서 실행하는 역할을 한다.
    // 현재 요구 학점 input이 네 개인데 for(var i = 0; i <= gradeDesiredEl.length; i++) 처럼 작성한 것의 축약형이라고 보면 된다.
    gradeDesiredEl.each(function(){
      /*
      if($(this).val()){
        gradeDesiredSum = gradeDesiredSum + parseInt($(this).val(), 10);
      }
      위 문법의 축약형.
      if 문 안이 한줄짜리일 경우 대괄호 없이 띄어쓰기만으로 표현이 가능하다.
      parseInt는 string을 int형으로 변경. input에 들어오는 값이나 엘리먼트 내 텍스트 값은 숫자여도 자료형은 string이다.
      첫번째 인자는 변경할 값, 두번째 인자는 몇진수로 변경할지.
      */
      if($(this).val()) gradeDesiredSum += parseInt($(this).val(), 10);
    });
    gradeNeedEl.each(function(){
      if($(this).data('needGrade')) gradeNeedSum += parseInt($(this).data('needGrade'), 10);
    });

    totalDesiredEl.text(gradeDesiredSum ? gradeDesiredSum : 0);
    totalNeedEl.text(gradeNeedSum ? gradeNeedSum : 0);
  }
  
  // 교양필수
  gradeCalc({
    requirement: '#culture-essential-desired',
    current: '#culture-essential-current',
    need: '#culture-essential-need'
  });
  gradeListAdder({
    btn: '#culture-essential-adder',
    ul_list: '#culture-essential-header',
    li_list: '#culture-essential-lister'
  });
  
  // 교양선택
  gradeCalc({
    requirement: '#culture-selection-desired',
    current: '#culture-selection-current',
    need: '#culture-selection-need'
  });
  gradeListAdder({
    btn: '#culture-selection-adder',
    ul_list: '#culture-selection-header',
    li_list: '#culture-selection-lister'
  });
  
  // 전공필수
  gradeCalc({
    requirement: '#major-essential-desired',
    current: '#major-essential-current',
    need: '#major-essential-need'
  });
  gradeListAdder({
    btn: '#major-essential-adder',
    ul_list: '#major-essential-header',
    li_list: '#major-essential-lister'
  });
  
  // 전공선택
  gradeCalc({
    requirement: '#major-selection-desired',
    current: '#major-selection-current',
    need: '#major-selection-need'
  });
  gradeListAdder({
    btn: '#major-selection-adder',
    ul_list: '#major-selection-header',
    li_list: '#major-selection-lister'
  });
});

function subtract(myself){ // -버튼 누르면 해당 리스트아이템 삭제하기
  myself.parent().parent().remove();
  allGradeSum();
}

function checkAll(myself){ // Check all 버튼 누르면 해당분야 전체 과목 체크버튼을 toggle 시킨다.
  if(myself.attr('id') == 'culture-essential-checker'){ // 교양필수 Toggle
    if(myself.data('allchecked') == '1'){
      $('#culture-essential-header li').each(function(){
        $(this).children().children().last().prev().prop('checked', false);
      });
      myself.data('allchecked', '0');
    } else {
      $('#culture-essential-header li').each(function(){
        $(this).children().children().last().prev().prop('checked', !($(this).is(':checked')));
      });
      myself.data('allchecked', '1');
    }
  }
  if(myself.attr('id') == 'culture-selection-checker'){ // 교양선택 Toggle
    if(myself.data('allchecked') == '1'){
      $('#culture-selection-header li').each(function(){
        $(this).children().children().last().prev().prop('checked', false);
      });
      myself.data('allchecked', '0');
    } else {
      $('#culture-selection-header li').each(function(){
        $(this).children().children().last().prev().prop('checked', !($(this).is(':checked')));
      });
      myself.data('allchecked', '1');
    }
  }
  if(myself.attr('id') == 'major-essential-checker'){ // 전공필수 Toggle
    if(myself.data('allchecked') == '1'){
      $('#major-essential-header li').each(function(){
        $(this).children().children().last().prev().prop('checked', false);
      });
      myself.data('allchecked', '0');
    } else {
      $('#major-essential-header li').each(function(){
        $(this).children().children().last().prev().prop('checked', !($(this).is(':checked')));
      });
      myself.data('allchecked', '1');
    }
  }
  if(myself.attr('id') == 'major-selection-checker'){ // 전공선택 Toggle
    if(myself.data('allchecked') == '1'){
      $('#major-selection-header li').each(function(){
        $(this).children().children().last().prev().prop('checked', false);
      });
      myself.data('allchecked', '0');
    } else {
      $('#major-selection-header li').each(function(){
        $(this).children().children().last().prev().prop('checked', !($(this).is(':checked')));
      });
      myself.data('allchecked', '1');
    }
  }
  allGradeSum();
}

function allGradeSum() {
  var subject_sum = 0;
  var need_sum = 0;
  var current_sum = 0;
  var all_need_sum = 0;
  
  $('#culture-essential-header li').each(function(){
    if($(this).children().children().next().val() && $(this).children().children().last().prev().is(":checked")) subject_sum += parseInt($(this).children().children().next().val(), 10);
  });
  need_sum = parseInt($('#culture-essential-desired').val(), 10) - subject_sum;
  $('#culture-essential-amount').text(subject_sum);
  $('#culture-essential-current').text(subject_sum);
  $('#culture-essential-need').text(need_sum);
  current_sum += subject_sum;
  all_need_sum += need_sum;
  subject_sum = 0;
  
  $('#culture-selection-header li').each(function(){
    if($(this).children().children().next().val() && $(this).children().children().last().prev().is(":checked")) subject_sum += parseInt($(this).children().children().next().val(), 10);
  });
  need_sum = parseInt($('#culture-selection-desired').val(), 10) - subject_sum;
  $('#culture-selection-amount').text(subject_sum);
  $('#culture-selection-current').text(subject_sum);
  $('#culture-selection-need').text(need_sum);
  current_sum += subject_sum;
  all_need_sum += need_sum;
  subject_sum = 0;
  
  $('#major-essential-header li').each(function(){
    if($(this).children().children().next().val() && $(this).children().children().last().prev().is(":checked")) subject_sum += parseInt($(this).children().children().next().val(), 10);
  });
  need_sum = parseInt($('#major-essential-desired').val(), 10) - subject_sum;
  $('#major-essential-amount').text(subject_sum);
  $('#major-essential-current').text(subject_sum);
  $('#major-essential-need').text(need_sum);
  current_sum += subject_sum;
  all_need_sum += need_sum;
  subject_sum = 0;
  
  $('#major-selection-header li').each(function(){
    if($(this).children().children().next().val() && $(this).children().children().last().prev().is(":checked")) subject_sum += parseInt($(this).children().children().next().val(), 10);
  });
  need_sum = parseInt($('#major-selection-desired').val(), 10) - subject_sum;
  $('#major-selection-amount').text(subject_sum);
  $('#major-selection-current').text(subject_sum);
  $('#major-selection-need').text(need_sum);
  current_sum += subject_sum;
  all_need_sum += need_sum;
  subject_sum = 0;
  
  $('#total-current').text(current_sum);
  $('#total-need').text(all_need_sum);
}