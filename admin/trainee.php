<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$trainee_con=new TraineeController();
$trainees=$trainee_con->getTrainees();



?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Trainee</strong> Dashboard</h1>

					<?php
                        if(isset($_GET['status']) && $_GET['status']==1)
                        {
                            echo "<div class='text-success'>New category has been successfully created.</div>";
                        }
                        else if(isset($_GET['status']) && $_GET['status']==2)
					    {
						    echo "<div class='text-success'>New category has been successfully updated.</div>";
					    }
                    ?>


					<div class="row">
                        <div class="col-md-3">
                            <a href="add_trainee.php" class='btn btn-dark'>Add New Trainee</a>
                        </div>
                    </div>

					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>City</th>
                                        <th>Education</th>
                                        <th>Remark</th>										
									</tr>
								</thead>
																	
									<tbody>
										<?php

										$count=1;
										foreach($trainees as $trainee)
										{
											echo "<tr>";
											echo "<td>" .$count++ . "</td>";
											echo "<td>" .$trainee['name'] . "</td>";
											echo "<td>" .$trainee['email'] . "</td>";
											echo "<td>" .$trainee['phone'] . "</td>";
                                            echo "<td>" .$trainee['city'] . "</td>";
                                            echo "<td>" .$trainee['education'] . "</td>";
                                            echo "<td>" .$trainee['remark'] . "</td>";
											echo "<td> <a class='btn btn-warning mx-3' href='edit_trainee.php?id=".$trainee['id']."'>Edit</a><a class='btn btn-danger'>Delete</a> </td>";
											echo "</tr>";
										}
										?>
									</tbody>

							</table>
						</div>
					</div>

				
					
				</div>
							</table>
						</div>
					</div>

				
					
				</div>
			</main>
<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>