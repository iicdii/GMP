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
  <?php include 'navigation.php'; ?>
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
                <div class="well well-sm">
                  <h5><strong>합계</strong>
                    요구학점 : <span id="total-desired">0</span>점 / 
                    현재학점 : <span id="total-current">0</span>점 / 
                    필요학점 : <span id="total-need">0</span>점</h5>
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
                            <span id="culture-essential-desired" class="grade-desired">0</span>
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
                            <span id="culture-selection-desired" class="grade-desired">0</span>
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
                            <span id="major-essential-desired" class="grade-desired">0</span>
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
                            <span id="major-selection-desired" class="grade-desired">0</span>
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
                      <div class="panel-heading">교양필수</div>
                      <ul class="list-group" id="culture-essential-header">
                        <li class="list-group-item" id="culture-essential-lister">
                          <div class="input-group">
                            <input type="text" id="culture-essential-subject" class="form-control" placeholder="과목명" readonly>
                            <input type="number" id="culture-essential-grade" class="form-control" placeholder="학점" readonly>
                            &nbsp;<input type="checkbox" id="culture-essential-passer" disabled>
                          </div>
                        </li>
                      </ul>
                      <div class="panel-body"><h5>합계 : <span id="culture-essential-amount">0</span>점</h5></div>
                    </div>
                    <div class="panel panel-info" id="lister">
                      <div class="panel-heading">교양선택</div>
                      <ul class="list-group" id="culture-selection-header">
                        <li class="list-group-item" id="culture-selection-lister">
                          <div class="input-group">
                            <input type="text" id="culture-selection-subject" class="form-control" placeholder="과목명" readonly>
                            <input type="number" id="culture-selection-grade" class="form-control" placeholder="학점" readonly>
                            &nbsp;<input type="checkbox" id="culture-selection-passer" disabled>
                          </div>
                        </li>
                      </ul>
                      <div class="panel-body"><h5>합계 : <span id="culture-selection-amount">0</span>점</h5></div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="panel panel-warning">
                      <div class="panel-heading">전공필수</div>
                      <ul class="list-group" id="major-essential-header">
                        <li class="list-group-item" id="major-essential-lister">
                          <div class="input-group">
                            <input type="text" id="major-essential-subject" class="form-control" placeholder="과목명" readonly>
                            <input type="number" id="major-essential-grade" class="form-control" placeholder="학점" readonly>
                            &nbsp;<input type="checkbox" id="major-essential-passer" disabled>
                          </div>
                        </li>
                      </ul>
                      <div class="panel-body"><h5>합계 : <span id="major-essential-amount">0</span>점</h5></div>
                    </div>
                    <div class="panel panel-danger">
                      <div class="panel-heading">전공선택</div>
                      <ul class="list-group" id="major-selection-header">
                        <li class="list-group-item" id="major-selection-lister">
                          <div class="input-group">
                            <input type="text" id="major-selection-subject" class="form-control" placeholder="과목명" readonly>
                            <input type="number" id="major-selection-grade" class="form-control" placeholder="학점" readonly>
                            &nbsp;<input type="checkbox" id="major-selection-passer" disabled>
                          </div>
                        </li>
                      </ul>
                      <div class="panel-body"><h5>합계 : <span id="major-selection-amount">0</span>점</h5></div>
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
                        <div class="panel-body">
                          교양필수&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" id="culture-essential-graph" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="right" data-original-title="0%" style="width: 0%"></div>
                          </div>
                          교양선택&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-info progress-bar-striped" id="culture-selection-graph" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="right" data-original-title="0%" style="width: 0%"></div>
                          </div>
                          전공필수&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-warning progress-bar-striped" id="major-essential-graph" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="right" data-original-title="0%" style="width: 0%"></div>
                          </div>
                          전공선택&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-danger progress-bar-striped" id="major-selection-graph" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="right" data-original-title="0%" style="width: 0%"></div>
                          </div>
                          총 학점&nbsp;
                          <div class="progress">
                            <div class="progress-bar progress-bar-success progress-bar-striped" id="total-culture-essential-graph" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="25" data-toggle="tooltip" data-placement="bottom" data-original-title="0%" style="width: 0%"></div>
                            <div class="progress-bar progress-bar-info progress-bar-striped" id="total-culture-selection-graph" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="25" data-toggle="tooltip" data-placement="bottom" data-original-title="0%" style="width: 0%"></div>
                            <div class="progress-bar progress-bar-warning progress-bar-striped" id="total-major-essential-graph" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="25" data-toggle="tooltip" data-placement="bottom" data-original-title="0%" style="width: 0%"></div>
                            <div class="progress-bar progress-bar-danger progress-bar-striped" id="total-major-selection-graph" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="25" data-toggle="tooltip" data-placement="bottom" data-original-title="0%" style="width: 0%"></div>
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
    
    <div class="container">
      <div class="page-header">
        <br/><h1>Find <small>See what users have been managing</small></h1>
      </div>
      <div id="page-content">
        <table class="table table-striped table-center">
          <thead id="post-head">
            <tr>
              <th>#</th>
              <th>Username</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody id="post-list">
            <tr>
              <td></td>
              <td></td>
              <td></td>
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
    <!-- End -->

    <script src="/js/find.js"></script>
    <script src="../js/navigation.js"></script>
  </body>
</html>