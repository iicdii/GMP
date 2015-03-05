Parse.initialize("ARKNOchu6ZJ851F3ofbuz1HYcAm6KjBZoj5D5wUo", "A0hhrBYZA4SGFus82faRzlkEjMZqMqmK1qHmqRR0");

var emptySubject = {
  subjectName: '',
  subjectGrade: '',
  subjectCheck: false
};

var post = new Vue({
  el: '#post',
  data: {
    users: []
  }
});

var total_view = new Vue({
  el: '#total_view',
  data: {
    total_desire: 0,
    total_current: 0,
    total_need: 0,
    public: true
  }
});

var culture_essential_grade = new Vue({
  el: '#culture_essential_grade',
  data: {
    title: '교양필수',
    desireGrade: 0,
    currentGrade: 0,
    needGrade: 0
  }
});

var culture_selection_grade = new Vue({
  el: '#culture_selection_grade',
  data: {
    title: '교양선택',
    desireGrade: 0,
    currentGrade: 0,
    needGrade: 0
  }
});

var major_essential_grade = new Vue({
  el: '#major_essential_grade',
  data: {
    title: '전공필수',
    desireGrade: 0,
    currentGrade: 0,
    needGrade: 0
  }
});

var major_selection_grade = new Vue({
  el: '#major_selection_grade',
  data: {
    title: '전공선택',
    desireGrade: 0,
    currentGrade: 0,
    needGrade: 0
  }
});

var culture_essential_subject = new Vue({
  el: '#culture_essential_subject',
  data: {
    title: '교양필수',
    items: [{
      subjectName: '',
      subjectGrade: '',
      subjectCheck: false
    }],
    subjectAmount: 0,
    allChecked: 0
  }
});

var culture_selection_subject = new Vue({
  el: '#culture_selection_subject',
  data: {
    title: '교양선택',
    items: [{
      subjectName: '',
      subjectGrade: '',
      subjectCheck: false
    }],
    subjectAmount: 0,
    allChecked: 0
  }
});

var major_essential_subject = new Vue({
  el: '#major_essential_subject',
  data: {
    title: '전공필수',
    items: [{
      subjectName: '',
      subjectGrade: '',
      subjectCheck: false
    }],
    subjectAmount: 0,
    allChecked: 0
  }
});

var major_selection_subject = new Vue({
  el: '#major_selection_subject',
  data: {
    title: '전공선택',
    items: [{
      subjectName: '',
      subjectGrade: '',
      subjectCheck: false
    }],
    subjectAmount: 0,
    allChecked: 0
  }
});

var graph_view = new Vue({
  el: '#graph_view',
  data: {
    culture_essential_title: 0 + '%',
    culture_essential_width: 0 + '%',
    culture_essential_valuenow: 0,
    culture_selection_title: 0 + '%',
    culture_selection_width: 0 + '%',
    culture_selection_valuenow: 0,
    major_essential_title: 0 + '%',
    major_essential_width: 0 + '%',
    major_essential_valuenow: 0,
    major_selection_title: 0 + '%',
    major_selection_width: 0 + '%',
    major_selection_valuenow: 0,
    total_culture_essential_title: 0 + '%',
    total_culture_essential_width: 0 + '%',
    total_culture_essential_valuenow: 0,
    total_culture_selection_title: 0 + '%',
    total_culture_selection_width: 0 + '%',
    total_culture_selection_valuenow: 0,
    total_major_essential_title: 0 + '%',
    total_major_essential_width: 0 + '%',
    total_major_essential_valuenow: 0,
    total_major_selection_title: 0 + '%',
    total_major_selection_width: 0 + '%',
    total_major_selection_valuenow: 0
  }
});

function getAllGradeSum(){
  var culture_essential_subject_amount = culture_essential_subject.subjectAmount;
  var culture_selection_subject_amount = culture_selection_subject.subjectAmount;
  var major_essential_subject_amount = major_essential_subject.subjectAmount;
  var major_selection_subject_amount = major_selection_subject.subjectAmount;
  culture_essential_subject_amount = 0;
  culture_selection_subject_amount = 0;
  major_essential_subject_amount = 0;
  major_selection_subject_amount = 0;
  culture_essential_subject.items.each(function(item){
    if(item.subjectCheck) culture_essential_subject_amount += parseInt(item.subjectGrade, 10);
  });
  culture_selection_subject.items.each(function(item){
    if(item.subjectCheck) culture_selection_subject_amount += parseInt(item.subjectGrade, 10);
  });
  major_essential_subject.items.each(function(item){
    if(item.subjectCheck) major_essential_subject_amount += parseInt(item.subjectGrade, 10);
  });
  major_selection_subject.items.each(function(item){
    if(item.subjectCheck) major_selection_subject_amount += parseInt(item.subjectGrade, 10);
  });
  culture_essential_subject.subjectAmount = culture_essential_subject_amount;
  culture_selection_subject.subjectAmount = culture_selection_subject_amount;
  major_essential_subject.subjectAmount = major_essential_subject_amount;
  major_selection_subject.subjectAmount = major_selection_subject_amount;

  culture_essential_grade.currentGrade = culture_essential_subject_amount;
  culture_essential_grade.needGrade = culture_essential_grade.desireGrade - culture_essential_subject_amount;
  culture_selection_grade.currentGrade = culture_selection_subject_amount;
  culture_selection_grade.needGrade = culture_selection_grade.desireGrade - culture_selection_subject_amount;
  major_essential_grade.currentGrade = major_essential_subject_amount;
  major_essential_grade.needGrade = major_essential_grade.desireGrade - major_essential_subject_amount;
  major_selection_grade.currentGrade = major_selection_subject_amount;
  major_selection_grade.needGrade = major_selection_grade.desireGrade - major_selection_subject_amount;

  total_view.total_desire = parseInt(culture_essential_grade.desireGrade,10) + parseInt(culture_selection_grade.desireGrade, 10) + parseInt(major_essential_grade.desireGrade,10) + parseInt(major_selection_grade.desireGrade,10);
  total_view.total_current = culture_essential_subject_amount + culture_selection_subject_amount + major_essential_subject_amount + major_selection_subject_amount;
  total_view.total_need = total_view.total_desire - total_view.total_current;
}

var mygrade = Parse.Object.extend("myGrade");
var query = new Parse.Query(mygrade);
query.descending("updatedAt");
query.equalTo("public", true);
var username, updatedAt;

query.find({
  success: function(object){
    var total_page_num = 1;
    var visible_page_num = 5;
    // 여기서부터 게시판에 뿌려주기
    for(var i=0;i<object.length;i++){
      if(i%5 === 0 && i!== 0){
        total_page_num++; // 총 페이지 수 계산
      }
    }

    for(var j=0;j<object.length;j++){
      if(j < 5){
        userid = object[j].get('userId');
        username = object[j].get('userName');
        updatedAt = Date.create(object[j].updatedAt).format('{yyyy}-{MM}-{dd} {HH}:{mm}:{ss}');
        post.users.push({
          index: j+1,
          id: object[j].get('userId'),
          name: username,
          date: updatedAt
        });
      }
    }
    // 여기까지 게시판에 뿌려주기
    // 페이지네이션
    $('#pager').twbsPagination({
      totalPages: total_page_num,
      visiblePages: visible_page_num,
      onPageClick: function (event, page) {
        post.users = [];
        var element, next_element, updatedAt;
        query = new Parse.Query(mygrade);
        query.descending("updatedAt");
        query.equalTo("public", true);
        query.find({
          success: function(object) {
            for(var j=(5*page)-5;j<object.length;j++){
              if(j < 5*page){
                userid = object[j].get('userId');
                username = object[j].get('userName');
                updatedAt = Date.create(object[j].updatedAt).format('{yyyy}-{MM}-{dd} {HH}:{mm}:{ss}');
                post.users.push({
                  index: j+1,
                  id: object[j].get('userId'),
                  name: username,
                  date: updatedAt
                });
              }
            }
          }
        });
      }
    });
    // 여기까지 페이지네이션
  }
});

$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var modal = $(this);
  var userid = button.data('userid');
  query = new Parse.Query(mygrade);
  query.equalTo("userId", userid);
  query.first(function(object){
    modal.find('.modal-title').text(object.get('userName') + "'s Grade");
    // 교양필수 data 로드
    var cultureEssential = object.get('cultureEssential');
    for(i=0; i<cultureEssential.current.length; i++){
      if(i===0) {
        culture_essential_subject.items[i].subjectName = cultureEssential.current[i].name;
        culture_essential_subject.items[i].subjectGrade = cultureEssential.current[i].grade;
        culture_essential_subject.items[i].subjectCheck = cultureEssential.current[i].isGet;
      }else{
        culture_essential_subject.items.push({
          subjectName:cultureEssential.current[i].name,
          subjectGrade:cultureEssential.current[i].grade,
          subjectCheck:cultureEssential.current[i].isGet
        });
      }
    }
    culture_essential_grade.desireGrade = cultureEssential.desired;

    // 교양선택 data 로드
    var cultureSelection = object.get('cultureSelection');
    for(i=0; i<cultureSelection.current.length; i++){
      if(i===0) {
        culture_selection_subject.items[i].subjectName = cultureSelection.current[i].name;
        culture_selection_subject.items[i].subjectGrade = cultureSelection.current[i].grade;
        culture_selection_subject.items[i].subjectCheck = cultureSelection.current[i].isGet;
      }else{
        culture_selection_subject.items.push({
          subjectName:cultureSelection.current[i].name,
          subjectGrade:cultureSelection.current[i].grade,
          subjectCheck:cultureSelection.current[i].isGet
        });
      }
    }
    culture_selection_grade.desireGrade = cultureSelection.desired;

    // 전공필수 data 로드
    var majorEssential = object.get('majorEssential');
    for(i=0; i<majorEssential.current.length; i++){
      if(i===0) {
        major_essential_subject.items[i].subjectName = majorEssential.current[i].name;
        major_essential_subject.items[i].subjectGrade = majorEssential.current[i].grade;
        major_essential_subject.items[i].subjectCheck = majorEssential.current[i].isGet;
      }else{
        major_essential_subject.items.push({
          subjectName:majorEssential.current[i].name,
          subjectGrade:majorEssential.current[i].grade,
          subjectCheck:majorEssential.current[i].isGet
        });
      }
    }
    major_essential_grade.desireGrade = majorEssential.desired;

    // 전공선택 data 로드
    var majorSelection = object.get('majorSelection');
    for(i=0; i<majorSelection.current.length; i++){
      if(i===0) {
        major_selection_subject.items[i].subjectName = majorSelection.current[i].name;
        major_selection_subject.items[i].subjectGrade = majorSelection.current[i].grade;
        major_selection_subject.items[i].subjectCheck = majorSelection.current[i].isGet;
      }else{
        major_selection_subject.items.push({
          subjectName:majorSelection.current[i].name,
          subjectGrade:majorSelection.current[i].grade,
          subjectCheck:majorSelection.current[i].isGet
        });
      }
    }
    major_selection_grade.desireGrade = majorSelection.desired;

    getAllGradeSum();

    var graph_current = parseInt(culture_essential_subject.subjectAmount, 10);
    var graph_desire = parseInt(cultureEssential.desired, 10);
    graph_view.culture_essential_width = Math.round((graph_current/graph_desire*100)) + "%";
    graph_view.culture_essential_valuenow = Math.round((graph_current/graph_desire*100));
    graph_view.total_culture_essential_width = Math.round((graph_current/graph_desire*100)/4) + "%";
    graph_view.total_culture_essential_valuenow = Math.round((graph_current/graph_desire*100)/4);

    graph_current = parseInt(culture_selection_subject.subjectAmount, 10);
    graph_desire = parseInt(cultureSelection.desired, 10);
    graph_view.culture_selection_width = Math.round((graph_current/graph_desire*100)) + "%";
    graph_view.culture_selection_valuenow = Math.round((graph_current/graph_desire*100));
    graph_view.total_culture_selection_width = Math.round((graph_current/graph_desire*100)/4) + "%";
    graph_view.total_culture_selection_valuenow = Math.round((graph_current/graph_desire*100)/4);

    graph_current = parseInt(major_essential_subject.subjectAmount, 10);
    graph_desire = parseInt(majorEssential.desired, 10);
    graph_view.major_essential_width = Math.round((graph_current/graph_desire*100)) + "%";
    graph_view.major_essential_valuenow = Math.round((graph_current/graph_desire*100));
    graph_view.total_major_essential_width = Math.round((graph_current/graph_desire*100)/4) + "%";
    graph_view.total_major_essential_valuenow = Math.round((graph_current/graph_desire*100)/4);

    graph_current = parseInt(major_selection_subject.subjectAmount, 10);
    graph_desire = parseInt(majorSelection.desired, 10);
    graph_view.major_selection_width = Math.round((graph_current/graph_desire*100)) + "%";
    graph_view.major_selection_valuenow = Math.round((graph_current/graph_desire*100));
    graph_view.total_major_selection_width = Math.round((graph_current/graph_desire*100)/4) + "%";
    graph_view.total_major_selection_valuenow = Math.round((graph_current/graph_desire*100)/4);
    $('[data-toggle="tooltip"]').tooltip({});
  });
});

$('#myModal').on('hidden.bs.modal', function (event) {
  
    total_view.total_desire= 0;
    total_view.total_current= 0;
    total_view.total_need= 0;
    total_view.public= true;

    culture_essential_grade.title= '교양필수';
    culture_essential_grade.desireGrade= 0;
    culture_essential_grade.currentGrade= 0;
    culture_essential_grade.needGrade= 0;

    culture_selection_grade.title= '교양선택';
    culture_selection_grade.desireGrade= 0;
    culture_selection_grade.currentGrade= 0;
    culture_selection_grade.needGrade= 0;

    major_essential_grade.title= '전공필수';
    major_essential_gradedesireGrade= 0;
    major_essential_grade.currentGrade= 0;
    major_essential_grade.needGrade= 0;

    major_selection_grade.title= '전공선택';
    major_selection_grade.desireGrade= 0;
    major_selection_grade.currentGrade= 0;
    major_selection_grade.needGrade= 0;

    culture_essential_subject.title= '교양필수';
    culture_essential_subject.items= [{
      subjectName: '',
      subjectGrade: '',
      subjectCheck: false
    }];
    culture_essential_subject.subjectAmount= 0;
    culture_essential_subject.allChecked= 0;
  
    culture_selection_subject.title= '교양선택';
    culture_selection_subject.items= [{
      subjectName: '',
      subjectGrade: '',
      subjectCheck: false
    }];
    culture_selection_subject.subjectAmount= 0;
    culture_selection_subject.allChecked= 0;

    major_essential_subject.title= '전공필수';
    major_essential_subject.items= [{
      subjectName: '',
      subjectGrade: '',
      subjectCheck: false
    }];
    major_essential_subject.subjectAmount= 0;
    major_essential_subject.allChecked= 0;

    major_selection_subject.title= '전공선택';
    major_selection_subject.items= [{
      subjectName: '',
      subjectGrade: '',
      subjectCheck: false
    }];
    major_selection_subject.subjectAmount= 0;
    major_selection_subject.allChecked= 0;
  
    graph_view.culture_essential_width= 0 + '%';
    graph_view.culture_essential_valuenow= 0;
    graph_view.culture_selection_width= 0 + '%';
    graph_view.culture_selection_valuenow= 0;
    graph_view.major_essential_width= 0 + '%';
    graph_view.major_essential_valuenow= 0;
    graph_view.major_selection_width= 0 + '%';
    graph_view.major_selection_valuenow= 0;
});