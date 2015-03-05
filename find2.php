<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find | GMP</title>
    <!-- Bootstrap css Load -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- End-->
    <link href="http://ksylvest.github.io/jquery-growl/stylesheets/jquery.growl.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/find.css">
  </head>
  <body>
    <?php include 'navigation2.php'; ?>
    <div class="modal fade bs-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" id="myModalContent">
          <div class="modal-header" id="myModalHeader">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><span id="modal-title-username"></span></h4>
          </div>
          <div class="modal-body" id="myModalBody">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a></li>
              <li role="presentation"><a href="#graph" aria-controls="graph" role="tab" data-toggle="tab">Graph</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="overview">
                <h3>Overview</h3>
                <div class="well well-sm" id="total_view">
                  <h5><strong>합계</strong>
                    요구학점 : <span v-text="total_desire"></span>점 / 
                    현재학점 : <span v-text="total_current"></span>점 / 
                    필요학점 : <span v-text="total_need"></span>점</h5>
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
                            <span v-text="desireGrade"></span>
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
                            <span v-text="desireGrade"></span>
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
                            <span v-text="desireGrade"></span>
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
                            <span v-text="desireGrade"></span>
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
                      </div>
                      <ul class="list-group">
                        <li class="list-group-item" v-repeat="items">
                          <div class="input-group">
                            <input type="text" v-model="subjectName" class="form-control" placeholder="과목명" readonly>
                            <input type="number" v-model="subjectGrade" placeholder="학점" class="form-control" readonly>&nbsp;
                            <input type="checkbox" v-model="subjectCheck" disabled>&nbsp;
                          </div>
                        </li>
                      </ul>
                      <div class="panel-body"><h5>합계 : <span v-model="subjectAmount">{{subjectAmount}}</span>점</h5></div>
                    </div>

                    <div class="panel panel-info" id="culture_selection_subject">
                      <div class="panel-heading"> {{title}}
                      </div>
                      <ul class="list-group">
                        <li class="list-group-item" v-repeat="items">
                          <div class="input-group">
                            <input type="text" v-model="subjectName" class="form-control" placeholder="과목명" readonly>
                            <input type="number" v-model="subjectGrade" placeholder="학점" class="form-control" readonly>&nbsp;
                            <input type="checkbox" v-model="subjectCheck" disabled>&nbsp;
                          </div>
                        </li>
                      </ul>
                      <div class="panel-body"><h5>합계 : <span v-model="subjectAmount">{{subjectAmount}}</span>점</h5></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="panel panel-warning" id="major_essential_subject">
                      <div class="panel-heading"> {{title}}
                      </div>
                      <ul class="list-group">
                        <li class="list-group-item" v-repeat="items">
                          <div class="input-group">
                            <input type="text" v-model="subjectName" class="form-control" placeholder="과목명" readonly>
                            <input type="number" v-model="subjectGrade" placeholder="학점" class="form-control" readonly>&nbsp;
                            <input type="checkbox" v-model="subjectCheck" disabled>&nbsp;
                          </div>
                        </li>
                      </ul>
                      <div class="panel-body"><h5>합계 : <span v-model="subjectAmount">{{subjectAmount}}</span>점</h5></div>
                    </div>
                    <div class="panel panel-danger" id="major_selection_subject">
                      <div class="panel-heading"> {{title}}
                      </div>
                      <ul class="list-group">
                        <li class="list-group-item" v-repeat="items">
                          <div class="input-group">
                            <input type="text" v-model="subjectName" class="form-control" placeholder="과목명" readonly>
                            <input type="number" v-model="subjectGrade" placeholder="학점" class="form-control" readonly>&nbsp;
                            <input type="checkbox" v-model="subjectCheck" disabled>&nbsp;
                          </div>
                        </li>
                      </ul>
                      <div class="panel-body"><h5>합계 : <span v-model="subjectAmount">{{subjectAmount}}</span>점</h5></div>
                    </div>
                  </div>
                </div>
              </div>

              <div role="tabpanel" class="tab-pane" id="graph">
                <h3>Graph</h3>
                <div class="container">
                  <div class="col-md-6">
                    <div class="row">
                      <div class="panel panel-default">
                        <div class="panel-body" id="graph_view">
                          교양필수&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" id="culture-essential-graph" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="right" v-attr="data-original-title:culture_essential_width, aria-valuenow:culture_essential_valuenow"  v-style="width:culture_essential_width"></div>
                          </div>
                          교양선택&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped" id="culture-selection-graph" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="right" v-attr="data-original-title:culture_selection_width, aria-valuenow:culture_selection_valuenow"  v-style="width:culture_selection_width"></div>
                          </div>
                          전공필수&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped" id="major-essential-graph" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="right" v-attr="data-original-title:major_essential_width, aria-valuenow:major_essential_valuenow"  v-style="width:major_essential_width"></div>
                          </div>
                          전공선택&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-danger progress-bar-striped" id="major-selection-graph" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="right" v-attr="data-original-title:major_selection_width, aria-valuenow:major_selection_valuenow"  v-style="width:major_selection_width"></div>
                          </div>
                          총 학점&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" id="total-culture-essential-graph" role="progressbar" aria-valuemin="0" aria-valuemax="25" data-toggle="tooltip" data-placement="bottom" v-attr="data-original-title:total_culture_essential_width, aria-valuenow:total_culture_essential_valuenow"  v-style="width:total_culture_essential_width"></div>
                            <div class="progress-bar progress-bar-info progress-bar-striped" id="total-culture-selection-graph" role="progressbar" aria-valuemin="0" aria-valuemax="25" data-toggle="tooltip" data-placement="bottom" v-attr="data-original-title:total_culture_selection_width, aria-valuenow:total_culture_selection_valuenow"  v-style="width:total_culture_selection_width"></div>
                            <div class="progress-bar progress-bar-warning progress-bar-striped" id="total-major-essential-graph" role="progressbar" aria-valuemin="0" aria-valuemax="25" data-toggle="tooltip" data-placement="bottom" v-attr="data-original-title:total_major_essential_width, aria-valuenow:total_major_essential_valuenow"  v-style="width:total_major_essential_width"></div>
                            <div class="progress-bar progress-bar-danger progress-bar-striped" id="total-major-selection-graph" role="progressbar" aria-valuemin="0" aria-valuemax="25" data-toggle="tooltip" data-placement="bottom" v-attr="data-original-title:total_major_selection_width, aria-valuenow:total_major_selection_valuenow"  v-style="width:total_major_selection_width"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container" id="post">
      <div class="page-header">
        <br/><h1>Find <small>See what users have been managing</small></h1>
      </div>
      <div id="page-content">
        <table class="table table-striped table-center">
          <thead>
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <tr v-repeat="users">
              <td>{{index}}</td>
              <td><a href="#myModal" v-attr="data-userid:id" data-toggle="modal" data-target=".bs-modal-lg"><b>{{name}}</b></a></td>
              <td>{{date}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <nav>
        <ul class="pagination" id="pager">
        </ul>
      </nav>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) and Bootstrap js load -->
    <script src="http://sugarjs.com/release/current/sugar.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//www.parsecdn.com/js/parse-1.3.4.min.js"></script>
    <script src="../js/jquery.twbsPagination.js"></script>
    <script src="http://ksylvest.github.io/jquery-growl/javascripts/jquery.growl.js" type="text/javascript"></script>
    <script src="http://prinzhorn.github.io/skrollr/dist/skrollr.min.js"></script>
    <script src="http://vuejs.org/js/vue.min.js"></script>
    <!-- End -->

    <script src="../js/find2.js"></script>
    <script src="../js/navigation.js"></script>
  </body>
</html>