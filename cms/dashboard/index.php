<?php
$title = 'Dashboard';
$page = 'dashboard';

require './../auth/dbConnect.php';
require './../auth/session.php';

$query = "SELECT DISTINCT * FROM activitylog";
$result = mysqli_query($dbConnect, $query);
 


$display  = mysqli_query($dbConnect, "SELECT section as category , COUNT(section) as category_count FROM contents WHERE stage='Published' GROUP BY category ORDER BY category ");
	
foreach($display as $data){
   $category[] = $data['category'];
   $count[] = $data['category_count']; 
}


$countstaff = mysqli_query($dbConnect,"SELECT * FROM staffs WHERE status='Active'"); 
$resultstaff = mysqli_num_rows($countstaff); 

$countart = mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Published'"); 
$resultart = mysqli_num_rows($countart); 


$views = mysqli_query($dbConnect,"SELECT * FROM contents WHERE views='1'"); 
$pageviews = mysqli_num_rows($views); 
checkSession();
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CURSOR CMS Sign In page">
    <link rel="stylesheet" href="../styles/tailwind.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="../resources/favicon.svg"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" defer></script>
    <script type="text/javascript" src="./../plugins/jquery.min.js" defer></script>
 

    <title><?php echo $title ?> - CURSOR CMS</title>
</head>


<body class="flex-row lg:flex lg:flex-none">
    <?php include './../ui/navigation.php'; ?>


    <main class="w-full p-8 ">

<div class="grid grid-cols-1 gap-4 lg:col-span-2">
    <!-- Welcome panel -->
    <section aria-labelledby="profile-overview-title">
       <div class="overflow-hidden bg-white rounded-lg">
          <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
          <div class="p-6 bg-white">
             <div class="sm:flex sm:items-center sm:justify-between">
                <div class="sm:flex sm:space-x-5">
                   <div class="flex-shrink-0">
                      <img class="w-20 h-20 mx-auto rounded-full" src="./../../resources/uploads/editorial-board/<?php echo $_SESSION['image']; ?>" alt="">
                   </div>
                   <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                      <p id="greetAffirmation" class="text-lg font-bold text-gray-900 sm:text-3xl">Welcome, <br><?php echo $_SESSION['fName'].'  '.$_SESSION['lName']; ?></p>
                      
                   </div>
                </div>
                <div class="flex justify-center mt-5 sm:mt-0">
                </div>
             </div>
          </div>
       </div>
    </section>

   
    <div class="grid grid-cols-2 gap-5 mt-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-3 xl:grid-cols-3">
       <!-- Card --> 
      
       <div class="p-5 overflow-hidden transition rounded-lg bg-amber-50 hover:bg-amber-100 hover:transition">
          <img class="w-12 h-12 mb-1 text-gray-400" src="./../resources/icon/icon_dashboard_visit.svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <dl>
             <dd>
                <div class="text-3xl font-bold text-gray-900 truncate"><?php echo $pageviews; ?></div>
             </dd>
             <dt class="font-medium text-gray-700 truncate text-md">Page Visits</dt>
          </dl>
          <p class="mt-2 text-xs text-gray-500"> </p>
       </div>

       <div class="p-5 overflow-hidden transition rounded-lg bg-amber-50 hover:bg-amber-100 hover:transition">
          <img class="w-12 h-12 mb-1 text-gray-400" src="./../resources/icon/icon_dashboard_staffs.svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <dl>
             <dd>
                <div class="text-3xl font-bold text-gray-900 truncate"><?php echo $resultstaff;  ?></div>
             </dd>
             <dt class="font-medium text-gray-700 truncate text-md">Current Staffs</dt>
          </dl>
          <p class="mt-2 text-xs text-gray-500">Compared to 78 last academic year </p>
       </div>



       <div class="p-5 overflow-hidden transition rounded-lg bg-amber-50 hover:bg-amber-100 hover:transition">
          <img class="w-12 h-12 mb-1 text-gray-400" src="./../resources/icon/icon_dashboard_news.svg" fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <dl>
             <dd>
                <div class="text-3xl font-bold text-gray-900 truncate"><?php echo $resultart;  ?></div>
             </dd>
             <dt class="font-medium text-gray-700 truncate text-md">Articles Posted</dt>
          </dl>
          <p class="mt-2 text-xs text-gray-500">Compared to 65 last academic year </p>
       </div>

    </div>
 </div>
 <br><br>
 <br><br>
 <p id="greetAffirmation" class="text-lg font-bold text-gray-900 sm:text-3xl mb-10">Content Analytics</p>
                <br><br>
<div class="chart">
		<canvas id="myChart"></canvas>
	</div> 


 
   <div class="flex flex-col  mt-12 "> 

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"> 
        
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg"> 
                <p id="greetAffirmation" class="text-lg font-bold text-gray-900 sm:text-3xl mb-10">Latest Logs</p>
                <br><br>
                    <table id="mytable" class="min-w-full divide-y divide-gray-200 table-fixed mt-12">
                        <thead class="bg-gray-50">
                            <tr> 
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Timestamp</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Staff</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Description</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Action</th>

                            </tr>
                        </thead>
                        <tbody class="divide-y">
                         
                           <?php  
                           $query = "SELECT * FROM activitylog LEFT JOIN staffs ON activitylog.staffID = staffs.staffID ORDER BY timestamp DESC LIMIT 10";


                           $result = mysqli_query($dbConnect, $query); 

                           while ($row = mysqli_fetch_array($result)) { ?>
                              <tr>
                              <td>
                              <div class="px-6 py-4 whitespace-normal w-max">
                                 <div class="text-sm text-gray-900"><?php echo date("F j Y", strtotime($row["timestamp"])); ?></div>
                                 <div class="text-sm text-gray-900"> <?php  date("g:i A", strtotime($row["timestamp"])) ; ?></div>
                               </div>
                              </td>

                              <td> 
                              <div class="px-6 py-4 w-max whitespace-nowrap">
            <div class="flex items-center">
                <div class="flex-shrink-0 w-10 h-10">
                    <img class="w-10 h-10 rounded-full" src="./../../resources/uploads/editorial-board/<?php echo $row['image']; ?>" alt="">
                </div>
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900"><?php echo  $row["fName"] . " " . $row["lName"];?>  </div>
                    <div class="text-sm text-gray-500"><?php echo $row["position"]; ?></div>
                </div>
            </div>
        </div>
                              </td>
                              <td> 
                              <div class="px-6 py-4 w-max whitespace-nowrap line-clamp-1">
                               <div class="block text-sm font-medium text-gray-900 line-clamp-1"><?php echo  $row["description"] ;?>  </div>

                               </div>
                              </td>
                              <td> 
                              <div class="px-6 py-4 w-max whitespace-nowrap line-clamp-1">
                              <div class="block text-sm font-medium text-gray-900 line-clamp-1"><?php echo $row["action"] ;?>  </div>
                              
                              </div>
                              </td>
                              <tr>
                           <?php 
                           }
                           ?>

                         </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.js"></script> 
    
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'line', // also try bar or other graph types

	// The data for our dataset
	data: {
		labels: <?php  echo json_encode($category)?>,
		// Information about the dataset
    datasets: [{
			label: "Count  ",
			backgroundColor: '#fff5e6',
			borderColor: '#e67e22',
			data: <?php echo json_encode($count)?>,
		}]
	},

    
	// Configuration options
	options: {
    layout: {
      padding: 50,
    },
		legend: {
			position: 'bottom',
		},
		title: {
			display: true,
			text: 'Published Contents'
		},
		scales: {
			yAxes: [{
				scaleLabel: {
					display: true,
					labelString: 'Published Count',
				},
               
			}],
			xAxes: [{
				scaleLabel: {
					display: true,
					labelString: 'Section'
				},
                
			}], 

            y: {
                    ticks: {
                        precision: 1,
                        color: "black"
                    },
                    grid: {
                        color: 'white',
                        borderColor: 'black' // <-- this line is answer to initial question
                    }
                },
                x: {
                    ticks: {
                        color: "red" //labels  
                    },
                    grid: {
                        color: 'rgb(179, 179, 179)',
                        borderColor: 'rgb(179, 179, 179)' // <-- this line is answer to initial question
                    }
                }
		}
	}
});

    </script> 




<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "109909348621946");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v15.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
</div>

    

</main>







</body>


</html>