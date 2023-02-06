
                    <?php 
 
                         $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
                         $select_draft_posts = mysqli_query($connection, $query);
                         $draft_posts = mysqli_num_rows($select_draft_posts);

                         $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                         $select_published_posts = mysqli_query($connection, $query);
                         $published_posts = mysqli_num_rows($select_published_posts);


                         $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
                         $select_disapproved_comments = mysqli_query($connection, $query);
                         $disapprove_comments = mysqli_num_rows($select_disapproved_comments);


                         $query = "SELECT * FROM users WHERE user_role = 'Subscriber' ";
                         $select_subscribers = mysqli_query($connection, $query);
                         $Subscribers = mysqli_num_rows($select_subscribers);

                         


                     ?>






                    <div id="columnchart_material" style="width: auto; height: 500px; margin-top: 100px;">

                          <script type="text/javascript">
                                  google.charts.load('current', {'packages':['bar']});
                                  google.charts.setOnLoadCallback(drawChart);

                                  function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                      ['CMS DATA', 'Count'],

                                      <?php 

                                      $element_text = ["All Posts","Active Posts","Draft Posts","Comments","Unapprove Comments","Users","Subscribers","Categories"];
                                      $element_count = [$post_counts,$draft_posts,$published_posts,$comments_counts,$disapprove_comments,$count_users,$Subscribers,$count_categories];


                                       
                                      for ($i = 0; $i < count($element_text); $i++) {

                                       echo "['$element_text[$i]' ".","." $element_count[$i] ],"; 

                                      }

                                       ?>
      
                                    ]);

                                    var options = {
                                      chart: {
                                        title: '',
                                        subtitle: '',
                                      }
                                    };

                                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                    chart.draw(data, google.charts.Bar.convertOptions(options));
                                  }
                          </script>

                    </div>