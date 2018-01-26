<!-- <!DOCTYPE html> -->
@extends ('layouts.admin')

@section('title','nice')

@section('content')
  <!-- container section start -->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
				</div>
			</div>
              
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-cloud-download"></i>
						<div class="count">6.674</div>
						<div class="title">Download</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-shopping-cart"></i>
						<div class="count">7.538</div>
						<div class="title">Purchased</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<div class="count">4.362</div>
						<div class="title">Order</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">1.426</div>
						<div class="title">Stock</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
                
			</div><!--/.row-->
			
                  <div class="col-lg-8">
                      <!--Project Activity start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                            <div class="row">
                              <div class="col-lg-8 task-progress pull-left">
                                  <h1>To Do Everyday</h1>                                  
                              </div>
                              <div class="col-lg-4">
                                <span class="profile-ava pull-right">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                        Jenifer smith
                                </span>                                
                              </div>
                            </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <tr>
                                  <td>Today</td>
                                  <td>
                                      web design
                                  </td>
                                  <td>
                                      <span class="badge bg-important">Upload</span>
                                  </td>
                                  <td>
                                    <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                    </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>Yesterday</td>
                                  <td>
                                      Project Design Task
                                  </td>
                                  <td>
                                      <span class="badge bg-success">Task</span>
                                  </td>
                                  <td>
                                      <div id="work-progress2"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>21-10-14</td>
                                  <td>
                                      Generate Invoice
                                  </td>
                                  <td>
                                      <span class="badge bg-success">Task</span>
                                  </td>
                                  <td>
                                      <div id="work-progress3"></div>
                                  </td>
                              </tr>                              
                              <tr>
                                  <td>22-10-14</td>
                                  <td>
                                      Project Testing
                                  </td>
                                  <td>
                                      <span class="badge bg-primary">To-Do</span>
                                  </td>
                                  <td>
                                      <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                      </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>24-10-14</td>
                                  <td>
                                      Project Release Date
                                  </td>
                                  <td>
                                      <span class="badge bg-info">Milestone</span>
                                  </td>
                                  <td>
                                      <div id="work-progress4"></div>
                                  </td>
                              </tr>                              
                              <tr>
                                  <td>28-10-14</td>
                                  <td>
                                      Project Release Date
                                  </td>
                                  <td>
                                      <span class="badge bg-primary">To-Do</span>
                                  </td>
                                  <td>
                                      <div id="work-progress5"></div>
                                  </td>
                              </tr>
							  <tr>
                                  <td>Last week</td>
                                  <td>
                                      Project Release Date
                                  </td>
                                  <td>
                                      <span class="badge bg-primary">To-Do</span>
                                  </td>
                                  <td>
                                      <div id="work-progress1"></div>
                                  </td>
                              </tr>
							  <tr>
                                  <td>last month</td>
                                  <td>
                                      Project Release Date
                                  </td>
                                  <td>
                                      <span class="badge bg-success">To-Do</span>
                                  </td>
                                  <td>
                                      <span class="profile-ava">
                                        <img alt="" class="simple" src="img/avatar1_small.jpg">
                                      </span>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--Project Activity end-->
                  </div>
		
		<div class="row">
			<div class="col-md-6 portlets">
            <div class="panel panel-default">
				<div class="panel-heading">
                  <h2><strong>Calendar</strong></h2>
				<div class="panel-actions">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>  
                 
                </div><br><br><br>
                <div class="panel-body">
                  <!-- Widget content -->
                  
                    <!-- Below line produces calendar. I am using FullCalendar plugin. -->
                    <div id="calendar"></div>
                  
                </div>
              </div> 
               
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->

@endsection
  <!-- container section start -->

@section('script')
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>
@endsection
