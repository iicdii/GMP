$(function(){
  function load(){
    var currentUser = Parse.User.current();
    if(currentUser){
      var mygrade = Parse.Object.extend("myGrade");
      var query = new Parse.Query(mygrade);
      query.equalTo("userId", currentUser.id);
      query.find({
        success: function(object) { // 해당하는 유저의 저장된 data를 찾았으면
            var successMessage = '<p>' +
                ' All data are loaded safely.' +
                '</p>';
            $.growl.notice({
              title: '<strong>Load Complete!</strong>',
              message: successMessage
            });
            var element = $('#culture-essential-lister'); // 여기서부터 교양필수 data 로드
            var cultureEssential = object[0].get('cultureEssential');
            for(i=0; i<cultureEssential.current.length-1; i++){
              $('#culture-essential-header').append(element.clone());
            }
            for(i=0; i<cultureEssential.current.length; i++){
              element.children().children().first().val(cultureEssential.current[i].name); // 과목명 load
              element.children().children().first().next().val(cultureEssential.current[i].grade); // 학점 load
              if(i>0) element.children().children().last().css('display', "inline-block"); 
              element.children().children().last().attr('checked', cultureEssential.current[i].isGet); // Check load
              element = element.next();
            }
            $('#culture-essential-desired').text(cultureEssential.desired);
            
            element = $('#culture-selection-lister');  // 여기서부터 교양선택 data 로드
            var cultureSelection = object[0].get('cultureSelection');
            for(i=0; i<cultureSelection.current.length-1; i++){
              $('#culture-selection-header').append(element.clone());
            }
            for(i=0; i<cultureSelection.current.length; i++){
              element.children().children().first().val(cultureSelection.current[i].name); // 과목명 load
              element.children().children().first().next().val(cultureSelection.current[i].grade); // 학점 load
              if(i>0) element.children().children().last().css('display', "inline-block"); 
              element.children().children().last().attr('checked', cultureSelection.current[i].isGet); // Check load
              element = element.next();
            }
            $('#culture-selection-desired').text(cultureSelection.desired);
          
            element = $('#major-essential-lister');  // 여기서부터 전공필수 data 로드
            var majorEssential = object[0].get('majorEssential');
            for(i=0; i<majorEssential.current.length-1; i++){
              $('#major-essential-header').append(element.clone());
            }
            for(i=0; i<majorEssential.current.length; i++){
              element.children().children().first().val(majorEssential.current[i].name); // 과목명 load
              element.children().children().first().next().val(majorEssential.current[i].grade); // 학점 load
              if(i>0) element.children().children().last().css('display', "inline-block"); 
              element.children().children().last().attr('checked', majorEssential.current[i].isGet); // Check load
              element = element.next();
            }
            $('#major-essential-desired').text(majorEssential.desired);
          
            element = $('#major-selection-lister');  // 여기서부터 전공선택 data 로드
            var majorSelection = object[0].get('majorSelection');
            for(i=0; i<majorSelection.current.length-1; i++){
              $('#major-selection-header').append(element.clone());
            }
            for(i=0; i<majorSelection.current.length; i++){
              element.children().children().first().val(majorSelection.current[i].name); // 과목명 load
              element.children().children().first().next().val(majorSelection.current[i].grade); // 학점 load
              if(i>0) element.children().children().last().css('display', "inline-block"); 
              element.children().children().last().attr('checked', majorSelection.current[i].isGet); // Check load
              element = element.next();
            }
            $('#major-selection-desired').text(majorSelection.desired);
            
            /*
           allGradeSum()의 기능과 같다. 
           load한 data들을 기반으로 모든 합계들을 계산한다.
           */
            var subject_sum = 0;
            var need_sum = 0;
            var current_sum = 0;
            var all_need_sum = 0;

            $('#culture-essential-header li').each(function(){
              if($(this).children().children().next().val() && $(this).children().children().last().is(":checked")) subject_sum += parseInt($(this).children().children().next().val(), 10);
            });
            need_sum = parseInt($('#culture-essential-desired').text(), 10) - subject_sum;
            $('#culture-essential-amount').text(subject_sum);
            $('#culture-essential-current').text(subject_sum);
            $('#culture-essential-need').text(need_sum);
            current_sum += subject_sum;
            all_need_sum += need_sum;
            subject_sum = 0;

            $('#culture-selection-header li').each(function(){
              if($(this).children().children().next().val() && $(this).children().children().last().is(":checked")) subject_sum += parseInt($(this).children().children().next().val(), 10);
            });
            need_sum = parseInt($('#culture-selection-desired').text(), 10) - subject_sum;
            $('#culture-selection-amount').text(subject_sum);
            $('#culture-selection-current').text(subject_sum);
            $('#culture-selection-need').text(need_sum);
            current_sum += subject_sum;
            all_need_sum += need_sum;
            subject_sum = 0;

            $('#major-essential-header li').each(function(){
              if($(this).children().children().next().val() && $(this).children().children().last().is(":checked")) subject_sum += parseInt($(this).children().children().next().val(), 10);
            });
            need_sum = parseInt($('#major-essential-desired').text(), 10) - subject_sum;
            $('#major-essential-amount').text(subject_sum);
            $('#major-essential-current').text(subject_sum);
            $('#major-essential-need').text(need_sum);
            current_sum += subject_sum;
            all_need_sum += need_sum;
            subject_sum = 0;

            $('#major-selection-header li').each(function(){
              if($(this).children().children().next().val() && $(this).children().children().last().is(":checked")) subject_sum += parseInt($(this).children().children().next().val(), 10);
            });
            need_sum = parseInt($('#major-selection-desired').text(), 10) - subject_sum;
            $('#major-selection-amount').text(subject_sum);
            $('#major-selection-current').text(subject_sum);
            $('#major-selection-need').text(need_sum);
            current_sum += subject_sum;
            all_need_sum += need_sum;
            subject_sum = 0;
          
            var desired_sum = parseInt(cultureEssential.desired, 10) + parseInt(cultureSelection.desired, 10) + parseInt(majorEssential.desired, 10) + parseInt(majorSelection.desired, 10);
            $('#total-current').text(current_sum);
            $('#total-need').text(all_need_sum);
            $('#total-desired').text(desired_sum);
          
            // 그래프 퍼센트 값 계산하기. 공식은 현재학점/요구학점 * 100.
            // 현재학점은 각 과목 span id의 amount로부터 얻어와서 parseInt로 정수화 시킨다.
            // 요구학점은 parse에서 load한 object의 desired로부터 얻어온다.
            function graph_calculate(options){
              var graph_current = parseInt($(options.current).text(), 10);
              var graph_desired = parseInt(options.object.desired, 10);
              $(options.graph).attr('aria-valuenow', Math.round((graph_current/graph_desired*100)));
              $(options.graph).attr('data-original-title', Math.round((graph_current/graph_desired*100)) + "%");
              $(options.graph).css('width', Math.round((graph_current/graph_desired*100)) + "%");
              $(options.total_graph).attr('aria-valuenow', Math.round((graph_current/graph_desired*100)/4));
              $(options.total_graph).attr('data-original-title', Math.round((graph_current/graph_desired*100)/4) + "%");
              $(options.total_graph).css('width', Math.round((graph_current/graph_desired*100)/4) + "%");
            }
            graph_calculate({ // 교양필수 그래프 계산
              current: '#culture-essential-amount',
              object: cultureEssential,
              graph: '#culture-essential-graph',
              total_graph: '#total-culture-essential-graph'
            });
            graph_calculate({ // 교양선택 그래프 계산
              current: '#culture-selection-amount',
              object: cultureSelection,
              graph: '#culture-selection-graph',
              total_graph: '#total-culture-selection-graph'
            });
            graph_calculate({ // 전공필수 그래프 계산
              current: '#major-essential-amount',
              object: majorEssential,
              graph: '#major-essential-graph',
              total_graph: '#total-major-essential-graph'
            });
            graph_calculate({ // 전공선택 그래프 계산
              current: '#major-selection-amount',
              object: majorSelection,
              graph: '#major-selection-graph',
              total_graph: '#total-major-selection-graph'
            });
          }
      });
    }
  }
  load();
});