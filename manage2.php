<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage | GMP</title>
    <!-- Bootstrap css Load -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- End-->
    <link href="http://ksylvest.github.io/jquery-growl/stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/manage.css">
  </head>
  <body>
  <?php include 'navigation2.php'; ?>
    <div id="manage" class="container">
      <div class="page-header">
        <br/><h1>Manage <small>Fill out your grade and manage it on your account.</small></h1>
      </div>
      <div class="row">

        <div class="col-xs-6 col-sm-3">
          <div class="panel panel-success" id="culture_essential_grade">
            <div class="panel-heading">
              <h3 class="panel-title">{{title}}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4">요구학점</div>
                <div class="col-xs-4">
                  <input type="text" v-model="desireGrade" v-on="keypress:allGradeSum,
                                                                 keyup:allGradeSum,
                                                                 keydown:allGradeSum" class="form-control">
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">현재학점</div>
                <div class="col-xs-4">
                  <span v-text="currentGrade"></span>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">필요학점</div>
                <div class="col-xs-4">
                  <span v-text="needGrade"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="panel panel-info" id="culture_selection_grade">
            <div class="panel-heading">
              <h3 class="panel-title">교양선택</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4">요구학점</div>
                <div class="col-xs-4">
                  <input type="text" v-model="desireGrade" v-on="keypress:allGradeSum,
                                                                 keyup:allGradeSum,
                                                                 keydown:allGradeSum" class="form-control">
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">현재학점</div>
                <div class="col-xs-4">
                  <span v-text="currentGrade"></span>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">필요학점</div>
                <div class="col-xs-4">
                  <span v-text="needGrade"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="panel panel-warning" id="major_essential_grade">
            <div class="panel-heading">
              <h3 class="panel-title">전공필수</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4">요구학점</div>
                <div class="col-xs-4">
                  <input type="text" v-model="desireGrade" v-on="keypress:allGradeSum,
                                                                 keyup:allGradeSum,
                                                                 keydown:allGradeSum" class="form-control">
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">현재학점</div>
                <div class="col-xs-4">
                  <span v-text="currentGrade"></span>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">필요학점</div>
                <div class="col-xs-4">
                  <span v-text="needGrade"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="panel panel-danger" id="major_selection_grade">
            <div class="panel-heading">
              <h3 class="panel-title">전공선택</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4">요구학점</div>
                <div class="col-xs-4">
                  <input type="text" v-model="desireGrade" v-on="keypress:allGradeSum,
                                                                 keyup:allGradeSum,
                                                                 keydown:allGradeSum" class="form-control">
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">현재학점</div>
                <div class="col-xs-4">
                  <span v-text="currentGrade"></span>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">필요학점</div>
                <div class="col-xs-4">
                  <span v-text="needGrade"></span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-success" id="culture_essential_subject">
            <div class="panel-heading"> {{title}}
              <button type="button" v-on="click:addSubject" data-toggle="tooltip" title="Add new subject" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus"></span></button>
              <button type="button" v-on="click:subjectCheckAll" data-toggle="tooltip" title="Check all" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
            <ul class="list-group">
              <li class="list-group-item" v-repeat="items">
                <div class="input-group">
                  <input type="text" v-model="subjectName" class="form-control" placeholder="과목명">
                  <input type="number" v-model="subjectGrade" placeholder="학점" class="form-control">&nbsp;
                  <input type="checkbox" v-model="subjectCheck" v-on="click:allGradeSum">&nbsp;
                  <button type="button" v-if="$index != 0" v-on="click:remove($index)" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-minus"></span></button>
                </div>
              </li>
            </ul>
            <div class="panel-body"><h5>합계 : <span v-model="subjectAmount">{{subjectAmount}}</span>점</h5></div>
          </div>
          
          <div class="panel panel-info" id="culture_selection_subject">
            <div class="panel-heading"> {{title}}
              <button type="button" v-on="click:addSubject" data-toggle="tooltip" title="Add new subject" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus"></span></button>
              <button type="button" v-on="click:subjectCheckAll" data-toggle="tooltip" title="Check all" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
            <ul class="list-group">
              <li class="list-group-item" v-repeat="items">
                <div class="input-group">
                  <input type="text" v-model="subjectName" class="form-control" placeholder="과목명">
                  <input type="number" v-model="subjectGrade" placeholder="학점" class="form-control">&nbsp;
                  <input type="checkbox" v-model="subjectCheck" v-on="click:allGradeSum">&nbsp;
                  <button type="button" v-if="$index != 0" v-on="click:remove($index)" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-minus"></span></button>
                </div>
              </li>
            </ul>
            <div class="panel-body"><h5>합계 : <span v-model="subjectAmount">{{subjectAmount}}</span>점</h5></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-warning" id="major_essential_subject">
            <div class="panel-heading"> {{title}}
              <button type="button" v-on="click:addSubject" data-toggle="tooltip" title="Add new subject" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus"></span></button>
              <button type="button" v-on="click:subjectCheckAll" data-toggle="tooltip" title="Check all" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
            <ul class="list-group">
              <li class="list-group-item" v-repeat="items">
                <div class="input-group">
                  <input type="text" v-model="subjectName" class="form-control" placeholder="과목명">
                  <input type="number" v-model="subjectGrade" placeholder="학점" class="form-control">&nbsp;
                  <input type="checkbox" v-model="subjectCheck" v-on="click:allGradeSum">&nbsp;
                  <button type="button" v-if="$index != 0" v-on="click:remove($index)" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-minus"></span></button>
                </div>
              </li>
            </ul>
            <div class="panel-body"><h5>합계 : <span v-model="subjectAmount">{{subjectAmount}}</span>점</h5></div>
          </div>
          <div class="panel panel-danger" id="major_selection_subject">
            <div class="panel-heading"> {{title}}
              <button type="button" v-on="click:addSubject" data-toggle="tooltip" title="Add new subject" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus"></span></button>
              <button type="button" v-on="click:subjectCheckAll" data-toggle="tooltip" title="Check all" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
            <ul class="list-group">
              <li class="list-group-item" v-repeat="items">
                <div class="input-group">
                  <input type="text" v-model="subjectName" class="form-control" placeholder="과목명">
                  <input type="number" v-model="subjectGrade" placeholder="학점" class="form-control">&nbsp;
                  <input type="checkbox" v-model="subjectCheck" v-on="click:allGradeSum">&nbsp;
                  <button type="button" v-if="$index != 0" v-on="click:remove($index)" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-minus"></span></button>
                </div>
              </li>
            </ul>
            <div class="panel-body"><h5>합계 : <span v-model="subjectAmount">{{subjectAmount}}</span>점</h5></div>
          </div>
        </div>
      </div>
      <div id="total_view">
      <h3>합계</h3>
      <h5>요구학점 : <span v-text="total_desire"></span>점 / 
        현재학점 : <span v-text="total_current"></span>점 / 
        필요학점 : <span v-text="total_need"></span>점</h5>
      <button type="button" id="savebutton" class="btn btn-success" onclick="doSave();">Save</button>
      &nbsp;<input type="checkbox" v-model="public"> 공개
      </div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) and Bootstrap js load -->
    <script src="http://sugarjs.com/release/current/sugar.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//www.parsecdn.com/js/parse-1.3.4.min.js"></script>
    <script src="http://ksylvest.github.io/jquery-growl/javascripts/jquery.growl.js" type="text/javascript"></script>
    <!-- End -->
    <script src="http://vuejs.org/js/vue.min.js"></script>
    <script src="/js/manage2.js"></script>
    <script src="/js/load2.js"></script>
    <script src="/js/save2.js"></script>
    <script src="../js/navigation.js"></script>
    <script>
      currentUser = Parse.User.current();
      if (currentUser)
        $("#savebutton").attr('class','btn btn-success');
      else
        $("#savebutton").attr('class','btn btn-warning');
      $(function () {
        $('[data-toggle="tooltip"]').tooltip({placement : 'top'});
      })
    </script> 
  </body>
</html>