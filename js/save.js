function doSave(){ //저장
  if(currentUser){
    var myGrade = Parse.Object.extend("myGrade");
    var mygrade = new myGrade();

    var cultureEssential = []; // 교양필수
    $('#culture-essential-header li').each(function(){
      cultureEssential.push({
        name: $(this).children().children().first().val(),  // 과목명
        grade: $(this).children().children().first().next().val(),  // 학점
        isGet: $(this).children().children().last().prev().is(":checked")  // 이수 여부
      });
    });
    var cultureSelection = []; // 교양선택
    $('#culture-selection-header li').each(function(){
      cultureSelection.push({
        name: $(this).children().children().first().val(),  // 과목명
        grade: $(this).children().children().first().next().val(),  // 학점
        isGet: $(this).children().children().last().prev().is(":checked")  // 이수 여부
      });
    });
    var majorEssential = []; // 전공필수
    $('#major-essential-header li').each(function(){
      majorEssential.push({
        name: $(this).children().children().first().val(),  // 과목명
        grade: $(this).children().children().first().next().val(),  // 학점
        isGet: $(this).children().children().last().prev().is(":checked")  // 이수 여부
      });
    });
    var majorSelection = []; // 전공선택
    $('#major-selection-header li').each(function(){
      majorSelection.push({
        name: $(this).children().children().first().val(),  // 과목명
        grade: $(this).children().children().first().next().val(),  // 학점
        isGet: $(this).children().children().last().prev().is(":checked")  // 이수 여부
      });
    });
    
    var query = new Parse.Query(myGrade);
    query.equalTo("userId", currentUser.id);
    query.first({
      success: function(object){
        // 이미 해당 유저의 data가 있으면 object에 해당 유저의 data를 받아옴.
        if(object){
          // 정보 공개여부 저장
          object.set("public", $('#public').is(':checked'));
          // 교양필수 데이터 저장
          object.set("cultureEssential", {
            desired: $('#culture-essential-desired').val(),
            current: cultureEssential
          });
          // 교양선택 데이터 저장
          object.set("cultureSelection", {
            desired: $('#culture-selection-desired').val(),
            current: cultureSelection
          });
          // 전공필수 데이터 저장
          object.set("majorEssential", {
            desired: $('#major-essential-desired').val(),
            current: majorEssential
          });
          // 전공선택 데이터 저장
          object.set("majorSelection", {
            desired: $('#major-selection-desired').val(),
            current: majorSelection
          });
          object.save(null, {
            success: function(mygrade) {
              var successMessage = '<p>' +
                  'All data are saved safely.' +
                  '</p>';
              $.growl.notice({
                title: '<strong>Save Complete!</strong>',
                message: successMessage
              });
            },
            error: function(mygrade, error) {
              // Execute any logic that should take place if the save fails.
              // error is a Parse.Error with an error code and message.
              $.growl.error({ message: 'Failed to save data, with error code: ' + error.message });
            }
          });
        }else{
          // 정보 공개여부 저장
          mygrade.set("public", $('#public').is(':checked'));
          // 유저 고유아이디 및 아이디 저장
          mygrade.set("userName", currentUser.getUsername());
          mygrade.set("userId", currentUser.id);
          // 교양필수 데이터 저장
          mygrade.set("cultureEssential", {
            desired: $('#culture-essential-desired').val(),
            current: cultureEssential
          });
          // 교양선택 데이터 저장
          mygrade.set("cultureSelection", {
            desired: $('#culture-selection-desired').val(),
            current: cultureSelection
          });
          // 전공필수 데이터 저장
          mygrade.set("majorEssential", {
            desired: $('#major-essential-desired').val(),
            current: majorEssential
          });
          // 전공선택 데이터 저장
          mygrade.set("majorSelection", {
            desired: $('#major-selection-desired').val(),
            current: majorSelection
          });
          mygrade.save(null, {
            success: function(mygrade) {
              var successMessage = '<p>' +
                  'All data are saved safely.' +
                  '</p>';
              $.growl.notice({
                title: '<strong>Save Complete!</strong>',
                message: successMessage
              });
            },
            error: function(mygrade, error) {
              // Execute any logic that should take place if the save fails.
              // error is a Parse.Error with an error code and message.
              $.growl.error({ message: 'Failed to save data, with error code: ' + error.message });
            }
          });
        }

      },
    })
    /*
    내 생각에는 데이터를
    사용자 아아디(parse user objectID) | 교양필수 | 교양선택 | 전공필수 | 전공선택
    요 형태로 집어넣는게 어떤가 싶은데
    교양필수 내 컬럼엔 obejct로 요구학점과 현재 과목, 과목에 부여된 학점만 저장하면 됨.
    현재 학점과 필요학점은 입력된 과목 토대로 계산해서 출력해주는 것임.
    culture-essential = {
      desired: 10, // 요구 학점
      current: [{
        name: '과목명'
        grade: 3, // 부여 학점
        isGet: true / false  // 이수 여부
      }, {
        name: '과목명',
        grade: 4,
        isGet: true / false
      }]
    }
    일케 집어넣는게 어떨까 싶음.
    */
  }else{
    var warnMessage = 'You need to sign in to save your grade information.' +
        '<p style="margin-top:6px;">' +
         '<a href="/signin.php" class="btn btn-default">Sign In</a> ' +
         '<a href="/signup.php" class="btn btn-info">or Sign Up</a>' +
        '</p>';
    $.growl.warning({
      message: warnMessage
    });
  }
}