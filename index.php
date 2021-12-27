<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Patients Data</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/css/custom.css"/>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/sweetalert.min.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="container">
		<div class="row py-3 mb-3">
			<div class="col-lg-6">
				<h1>Patients Data</h1>
			</div>
			<div class="col-lg-6 text-right">
				<a href="#" class="btn btn-success" data-toggle="modal" data-target="#addPatient">+ Add</a>
			</div>
		</div>
		<div class="row py-3">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table id="patientsTab" class="table">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th>Name</th>
								<th>Age</th>
								<th>City</th>
								<th>State</th>
								<th>Country</th>
								<th>Birth Date</th>
								<th>Blood Group</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="addPatient" class="modal customModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="patientForm">
        	<input type="hidden" name="type" id="type" value="insert" />
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Name</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="text" name="name" id="name" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Age</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="number" name="age" id="age" class="form-control" max="200" step="1" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">City</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="text" name="city" id="city" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">State</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="text" name="state" id="state" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Country</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="text" name="country" id="country" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Date of Birth</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="date" name="dob" id="dob" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Blood Group</label>
        		<div class="col-lg-8 col-sm-12">
	        		<select name="blood_group" id="blood_group" class="form-control" required>
	        			<option value="">Select Blood Group</option>
	        			<option value="A+">A+</option>
	        			<option value="A-">A-</option>
	        			<option value="B+">B+</option>
	        			<option value="B-">B-</option>
	        			<option value="AB+">AB+</option>
	        			<option value="AB-">AB-</option>
	        			<option value="O+">O+</option>
	        			<option value="O-">O-</option>
	        		</select>
	        	</div>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="savePatient">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="editPatient" class="modal customModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editPatientForm">
        	<input type="hidden" name="pid" id="pid" required />
        	<input type="hidden" name="type" id="type" value="update" />
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Name</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="text" name="name" id="u_name" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Age</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="number" name="age" id="u_age" class="form-control" max="200" step="1" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">City</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="text" name="city" id="u_city" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">State</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="text" name="state" id="u_state" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Country</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="text" name="country" id="u_country" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Date of Birth</label>
        		<div class="col-lg-8 col-sm-12">
        			<input type="date" name="dob" id="u_dob" class="form-control" required />
        		</div>
        	</div>
        	<div class="form-group row">
        		<label class="col-lg-4 col-sm-12">Blood Group</label>
        		<div class="col-lg-8 col-sm-12">
	        		<select name="blood_group" id="u_blood_group" class="form-control" required>
	        			<option value="">Select Blood Group</option>
	        			<option value="A+">A+</option>
	        			<option value="A-">A-</option>
	        			<option value="B+">B+</option>
	        			<option value="B-">B-</option>
	        			<option value="AB+">AB+</option>
	        			<option value="AB-">AB-</option>
	        			<option value="O+">O+</option>
	        			<option value="O-">O-</option>
	        		</select>
	        	</div>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="updatePatient">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).ready(function(){
		//Show Patient Data
		const getData = function() {
			$.ajax({
				url: 'patients.php',
				type: 'POST',
				data: 'type=select',
				cache: false,
				success: function(data){
					let dt = JSON.parse(data);
					let ds = ``;
					if(dt.length) {
						$.each(dt, function(i, o){
							ds += `<tr>
									<td>${i + 1}</td>
									<td>${o.name}</td>
									<td>${o.age}</td>
									<td>${o.city}</td>
									<td>${o.state}</td>
									<td>${o.country}</td>
									<td>${o.dob}</td>
									<td>${o.blood_group}</td>
									<td><a href="#" class="editDataById" data-id="${o.id}" data-toggle="modal" data-target="#editPatient">Edit</a> <a href="#" class="deleteData" data-id="${o.id}">Delete</a></td>
								</tr>`;
						});
					} else {
						ds += `<tr>
									<td colspan="9" align="center">No data available</td>
								</tr>`;
					}
					$("#patientsTab tbody").html(ds);
				}
			});
		}
		getData();

		//Insert Patient Data
		$("#patientForm").submit(function(e){
			let formData = new FormData(this);

			$.ajax({
				url: 'patients.php',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				beforeSend: function() {
					$("#savePatient").attr('disabled', true);
				},
				success: function(response){
					if(response == 1) {
						swal("", "Data saved!", "success");
						getData();
						$("input:not([type='hidden']), select").val('');
						$('#addPatient').modal('hide');
					} else {
						swal("", "Data save failed", "error");
					}
					$("#savePatient").attr('disabled', false);
				}
			});

			e.preventDefault();
		});

		$("#savePatient").click(function(){
			$("#patientForm").submit();
		});

		//Update Patient Data
		$(document).on("click", ".editDataById", function(e){
			let pid = $(this).attr("data-id");

			$.ajax({
				url: 'patients.php',
				type: 'POST',
				data: `id=${pid}&type=selectById`,
				cache: false,
				success: function(data){
					let dt = JSON.parse(data);

					$("#pid").val(dt.id);
					$("#u_name").val(dt.name);
					$("#u_age").val(dt.age);
					$("#u_city").val(dt.city);
					$("#u_state").val(dt.state);
					$("#u_country").val(dt.country);
					$("#u_dob").val(dt.dob);
					$("#u_blood_group").val(dt.blood_group);
				}
			});

			e.preventDefault();
		});

		$("#editPatientForm").submit(function(e){
			let formData = new FormData(this);

			$.ajax({
				url: 'patients.php',
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				beforeSend: function() {
					$("#updatePatient").attr('disabled', true);
				},
				success: function(response){
					if(response == 1) {
						swal("", "Data updated!", "success");
						getData();
						$('#editPatient').modal('hide');
					} else {
						swal("", "Data update failed", "error");
					}
					$("#updatePatient").attr('disabled', false);
				}
			});

			e.preventDefault();
		});

		$("#updatePatient").click(function(){
			$("#editPatientForm").submit();
		});

		//Delete Patient Data
		$(document).on("click", ".deleteData", function(e){
			let pid = $(this).attr("data-id");

			swal("", "Do you really want to delete?", "warning", {
				buttons: ["No", "Yes"],
			})
			.then((res) => {
			  if (res) {
			  	$.ajax({
					url: 'patients.php',
					type: 'POST',
					data: `id=${pid}&type=delete`,
					cache: false,
					success: function(response){
						if(response == 1) {
							swal("", "Data deleted!", "success");
							getData();
						} else {
							swal("", "Data delete failed", "error");
						}
					}
				});
			  }
			});

			e.preventDefault();
		});
	});
</script>
</body>
</html>