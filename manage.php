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
  <?php include 'navigation.php'; ?>
    <div class="container">
      <div class="page-header">
        <br/><h1>Manage <small>Fill out your grade and manage it on your account.</small></h1>
      </div>
      <div class="row">

        <div class="col-xs-6 col-sm-3">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">교양필수</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4">요구학점</div>
                <div class="col-xs-4">
                  <input type="text" id="culture-essential-desired" value="0" class="form-control grade-desired">
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">현재학점</div>
                <div class="col-xs-4">
                  <span id="culture-essential-current" class="grade-current">0</span>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">필요학점</div>
                <div class="col-xs-4">
                  <span id="culture-essential-need" class="grade-need">0</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">교양선택</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4">요구학점</div>
                <div class="col-xs-4">
                  <input type="text" id="culture-selection-desired" value="0" class="form-control grade-desired">
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">현재학점</div>
                <div class="col-xs-4">
                  <span id="culture-selection-current" class="grade-current">0</span>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">필요학점</div>
                <div class="col-xs-4">
                  <span id="culture-selection-need" class="grade-need">0</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">전공필수</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4">요구학점</div>
                <div class="col-xs-4">
                  <input type="text" id="major-essential-desired" value="0" class="form-control grade-desired">
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">현재학점</div>
                <div class="col-xs-4">
                  <span id="major-essential-current" class="grade-current">0</span>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">필요학점</div>
                <div class="col-xs-4">
                  <span id="major-essential-need" class="grade-need">0</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-6 col-sm-3">
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">전공선택</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-4">요구학점</div>
                <div class="col-xs-4">
                  <input type="text" id="major-selection-desired" value="0" class="form-control grade-desired">
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">현재학점</div>
                <div class="col-xs-4">
                  <span id="major-selection-current" class="grade-current">0</span>
                </div>
              </div>
              <br/>
              <div class="row">
                <div class="col-xs-4">필요학점</div>
                <div class="col-xs-4">
                  <span id="major-selection-need" class="grade-need">0</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="panel panel-success" id="lister">
            <div class="panel-heading">교양필수&nbsp;
              <button type="button" id="culture-essential-adder" data-toggle="tooltip" title="Add new subject" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus"></span></button>
              <button type="button" id="culture-essential-checker" onclick="checkAll($(this));" data-toggle="tooltip" title="Check all" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
            <ul class="list-group" id="culture-essential-header">
              <li class="list-group-item" id="culture-essential-lister">
                <div class="input-group">
                  <input type="text" id="culture-essential-subject" class="form-control" placeholder="과목명">
                  <input type="number" id="culture-essential-grade" class="form-control culture-essential-grade" onkeypress="allGradeSum();" onkeydown="allGradeSum();" onkeyup="allGradeSum();" onmouseup="allGradeSum();" onmousedown="allGradeSum();" placeholder="학점">
                  &nbsp;<input type="checkbox" id="culture-essential-passer" onclick="allGradeSum();">
                  &nbsp;<button type="button" id="culture-essential-subtracter" onclick="subtract($(this));" class="btn btn-xs btn-default" style="display:none;"><span class="glyphicon glyphicon-minus"></span></button>
                </div>
              </li>
            </ul>
            <div class="panel-body"><h5>합계 : <span id="culture-essential-amount">0</span>점</h5></div>
          </div>
          <div class="panel panel-info" id="lister">
            <div class="panel-heading">교양선택&nbsp;
              <button type="button" id="culture-selection-adder" data-toggle="tooltip" title="Add new subject" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus"></span></button>
              <button type="button" id="culture-selection-checker" onclick="checkAll($(this));" data-toggle="tooltip" title="Check all" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
            <ul class="list-group" id="culture-selection-header">
              <li class="list-group-item" id="culture-selection-lister">
                <div class="input-group">
                  <input type="text" id="culture-selection-subject" class="form-control" placeholder="과목명">
                  <input type="number" id="culture-selection-grade" class="form-control culture-selection-grade" onkeypress="allGradeSum();" onkeydown="allGradeSum();" onkeyup="allGradeSum();" onmouseup="allGradeSum();" onmousedown="allGradeSum();" placeholder="학점">
                  &nbsp;<input type="checkbox" id="culture-selection-passer" onclick="allGradeSum();">
                  &nbsp;<button type="button" id="culture-selection-subtracter" onclick="subtract($(this));" class="btn btn-xs btn-default" style="display:none;"><span class="glyphicon glyphicon-minus"></span></button>
                </div>
              </li>
            </ul>
            <div class="panel-body"><h5>합계 : <span id="culture-selection-amount">0</span>점</h5></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-warning">
            <div class="panel-heading">전공필수&nbsp;
              <button type="button" id="major-essential-adder" data-toggle="tooltip" title="Add new subject" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus"></span></button>
              <button type="button" id="major-essential-checker" onclick="checkAll($(this));" data-toggle="tooltip" title="Check all" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
            <ul class="list-group" id="major-essential-header">
              <li class="list-group-item" id="major-essential-lister">
                <div class="input-group">
                  <input type="text" id="major-essential-subject" class="form-control" placeholder="과목명">
                  <input type="number" id="major-essential-grade" class="form-control major-essential-grade" onkeypress="allGradeSum();" onkeydown="allGradeSum();" onkeyup="allGradeSum();" onmouseup="allGradeSum();" onmousedown="allGradeSum();" placeholder="학점">
                  &nbsp;<input type="checkbox" id="major-essential-passer" onclick="allGradeSum();">
                  &nbsp;<button type="button" id="major-essential-subtracter" onclick="subtract($(this));" class="btn btn-xs btn-default" style="display:none;"><span class="glyphicon glyphicon-minus"></span></button>
                </div>
              </li>
            </ul>
            <div class="panel-body"><h5>합계 : <span id="major-essential-amount">0</span>점</h5></div>
          </div>
          <div class="panel panel-danger">
            <div class="panel-heading">전공선택&nbsp;
              <button type="button" id="major-selection-adder" data-toggle="tooltip" title="Add new subject" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-plus"></span></button>
              <button type="button" id="major-selection-checker" onclick="checkAll($(this));" data-toggle="tooltip" title="Check all" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span></button>
            </div>
            <ul class="list-group" id="major-selection-header">
              <li class="list-group-item" id="major-selection-lister">
                <div class="input-group">
                  <input type="text" id="major-selection-subject" class="form-control" placeholder="과목명">
                  <input type="number" id="major-selection-grade" class="form-control major-selection-grade" onkeypress="allGradeSum();" onkeydown="allGradeSum();" onkeyup="allGradeSum();" onmouseup="allGradeSum();" onmousedown="allGradeSum();" placeholder="학점">
                  &nbsp;<input type="checkbox" id="major-selection-passer" onclick="allGradeSum();">
                  &nbsp;<button type="button" id="major-selection-subtracter" onclick="subtract($(this));" class="btn btn-xs btn-default" style="display:none;"><span class="glyphicon glyphicon-minus"></span></button>
                </div>
              </li>
            </ul>
            <div class="panel-body"><h5>합계 : <span id="major-selection-amount">0</span>점</h5></div>
          </div>
        </div>
      </div>
      <h3>합계</h3>
      <h5>요구학점 : <span id="total-desired">0</span>점 / 
        현재학점 : <span id="total-current">0</span>점 / 
        필요학점 : <span id="total-need">0</span>점</h5>
      <button type="button" id="savebutton" class="btn btn-success" onclick="doSave();">Save</button>
      &nbsp;<input type="checkbox" id="public" checked> 공개
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) and Bootstrap js load -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//www.parsecdn.com/js/parse-1.3.4.min.js"></script>
    <script src="http://ksylvest.github.io/jquery-growl/javascripts/jquery.growl.js" type="text/javascript"></script>
    <!-- End -->
      
    <script src="/js/grade_calc.js"></script>
    <script src="/js/save.js"></script>
    <script src="/js/load.js"></script>
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