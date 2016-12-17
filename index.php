<!DOCTYPE html>
<html lang="EN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--datajs are write by myself to run chart function-->
    <script src="datajs/bar.js"></script>
    <script src="datajs/lines.js"></script>
    <script src="datajs/pie.js"></script>
    <!--js library-->
    <script src="js/jquery.min.js"></script>
    <script src="js/echarts.common.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <!--to fix the selection bar-->
    <script type="text/javascript">
      $(function(){
        var nav=$(".sticky"); 
        var win=$(window); 
        var sc=$(document);
        win.scroll(function(){
          if(sc.scrollTop()>=100){
            nav.addClass("fixednav"); 
            $(".navTmp").fadeIn(); 
          }else{
           nav.removeClass("fixednav");
           $(".navTmp").fadeOut();
          }
        })  
        })

    </script>
  </head>
  <body>
    <div id="wrapper">
    <!--navbar, show basic nav information and for add new functions like search and sign up-->
      <header class="navbar" role="banner">
        <div class="navbar-wrapper">
          <div class="container" id="navcontainer">
            <nav class="navbar navbar-inverse" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">Survey Data</a>
                </div>
                <form class="navbar-form navbar-left" role="search">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Search</button>
                </form>
                <div class="navbar-right col-xs-3">
                  <ul class="nav navbar-nav">
                    <li><a >Sign Up</a></li>
                    <li><a >Sign In</a></li>
                  </ul>
                </div>
              </div>
            </nav>

          </div>
        </div>
      </header>
      <div class="mainnav op">
<!-- this container is for selection bar, all functions program in the ajax.js-->
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8 sticky" >
              <form class="form-inline" role="form">
              <!--choose variety-->
                 <div class="form-group">
                    <h3><label class="label label-primary">Variety</label>
                    <select class="form-control" id="variety" name="variety" onchange="totalchange()">
                      <option  value="a" selected="selected">AA</option>
                      <option  value="b" >BB</option>
                      <option  value="c" >CC</option>
                    </select></h3>                    
                </div >
                <!--choose farm-->
                  <div class="form-group" >
                  <h3>
                    <span class="label label-success">Farm</span>
                    <select class="form-control" id="farm" name="farm" onchange="change()">
                      <option value="1" selected="selected" >1</option>
                      <option value="2" >2</option>
                    </select>
                    </h3>
                  </div >
                  <!--choose date-->
                  <div class="form-group">
                  <h3>
                    <span class="label label-info" >Date</span>
                    <select class="form-control" id="date" name="date" onchange="piechange()">
                      <option value="2016-05-08" >2016-05-08</option>
                      <option value="2016-05-15" >2016-05-15</option>
                      <option value="2016-05-22" >2016-05-22</option>
                      <option value="2016-05-29" >2016-05-29</option>
                      <option value="2016-06-05" >2016-06-05</option>
                      <option value="2016-06-12" >2016-06-12</option>
                      <option value="2016-06-19" >2016-06-19</option>
                      <option value="2016-06-26" >2016-06-26</option>
                      <option value="2016-07-03" >2016-07-03</option>
                      <option value="2016-07-10" >2016-07-10</option>
                      <option value="2016-07-17" >2016-07-17</option>
                      <option value="2016-07-24" >2016-07-24</option>
                      <option value="2016-07-31" >2016-07-31</option>
                      <option value="2016-08-07" >2016-08-07</option>
                      <option value="2016-08-14" >2016-08-14</option>
                      <option value="2016-08-21" >2016-08-21</option>
                      <option value="2016-08-28" >2016-08-28</option>
                      <option value="2016-09-04" >2016-09-04</option>
                      <option value="2016-09-11" >2016-09-11</option>
                      <option value="2016-09-18" >2016-09-18</option>
                      <option value="2016-09-25" >2016-09-25</option>
                      <option value="2016-10-02" >2016-10-02</option>
                      <option value="2016-10-09" >2016-10-09</option>
                      <option value="2016-10-16" >2016-10-16</option>
                      <option value="2016-10-23" >2016-10-23</option>

                    </select>
                    </h3>
                  </div>

                </form>
            </div>
                

          </div>



        </div> <!-- /.container -->

      </div> <!-- /.mainnav -->
        <!--main body, include all charts area-->
      <div class="content">

        <div class="container">
            <div class="row">

              <div id="total-line" class="col-md-12 " style="height:500px;">
              </div>
              <div id="farm-line" class="col-md-12 " style="height:500px;">
              </div>
            </div>
            <div class="row">

              <div id="total-pie" class="col-md-6 " style="height:400px;">
              </div>
              <div id="farm-pie" class="col-md-6 " style="height:400px;">
              </div>
            </div>
            <div class="row">

              <div id="total-bar" class="col-md-6 " style="height:400px;">
              </div>
              <div id="farm-bar" class="col-md-6 " style="height:400px;">
              </div>
            </div>



        </div> <!-- /.container -->

      </div> <!-- .content -->

  </div> <!-- /#wrapper -->

  <footer class="footer">
    <div class="container">
      <p class="pull-left">Copyright &copy; 2013-16 Luwan Huang.</p>
    </div>
  </footer>

  <script src="datajs/jax.js"></script>

  </body>
</html>