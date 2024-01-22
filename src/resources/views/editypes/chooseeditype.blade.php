@extends('layouts.layout')

@section('title', 'EDI Types')


@section('content')



<h2>Choose the EDI Type</h2>

<div class="container edi-grid">
	<div class="row header">
		<div class="bs-bars float-left">
		</div>
	</div>
	<div class="row header">
		<div class="col col-1 px-1">
			<button type="button" class="btn bg-light text-success edi-btn-new" id="row_new" name="row_new" 
					data-bs-toggle="tooltip" title="New">
					
  					<span>New +</span> 
				</button>
		</div>
		
		<div class="col col-1">
			Id
		</div>
		<div class="col">
			Name
		</div>
		<div class="col col-2 d-none d-sm-block">
			Enabled
		</div>
		<div class="col col-2 d-none d-sm-block">
			Control Number
		</div>
		<div class="col col-4 d-none d-sm-block fs-6">
			<div>Interchange Sender</div>
			<div>Interchange Receiver</div>
		</div>
		
	</div>

	@forelse ($ediTypes as $ediType)
	
   		{{-- $beforeProcessObject = (object) unserialize($ediType->edt_before_process_object); --}} 
		<div class="row">
			<div class="col col-1 edi-btn-col">
				<button type="button" class="btn btn-warning edi-btn-copy" id="row_{{ $ediType->id }}" name="row_{{ $ediType->id }}" 
					data-bs-toggle="tooltip" title="{{ $ediType->edt_name }}">
  					Run 
				</button>
			</div>
 			
			<div class="col col-1">
				<a href="/edilaravel/editype/{{ $ediType->id }}/edit" >{{ $ediType->id }}</a>
			</div>
			<div class="col">   
   				<a href="/edilaravel/editype/{{ $ediType->id }}/edit" >{{ $ediType->edt_name }}</a>
   			</div>
			<div class="col col-2 d-none d-sm-block text-center">   
   				{{ $ediType->edt_enabled }}
   			</div>
			<div class="col col-2 d-none d-sm-block text-end">   
   				{{ $ediType->edt_control_number }}
   			</div>
			<div class="col col-4 d-none d-sm-block fs-6">   
   				<div>{{ $ediType->interchange_sender_id }}</div>
   				<div>{{ $ediType->interchange_receiver_id }}</div>
   			</div>
   			
   		</div>	

   		
	@empty
   		<p> 'No EDI Types yet' </p>
	@endforelse   		
   
   
<div class="modal" id="edi-duplicate-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="edi-duplicate-title" class="modal-title">Create EDI File</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<p class="edi-duplicate-body"> 
      		<label for="edi_test_file" class="form-label">Test File</label>   
				<select id="edi_test_file" class="mb-3 form-select" aria-label=".edi_test_file" onchange="selectChanged(this.value)">>
				   <option value="T" {{ $edi_test_file == 'T' ? 'selected' : '' }}>Test</option>
		   		<option value="P" {{ $edi_test_file == 'P' ? 'selected' : '' }}>Production</option>
		   	</select>
		   </p>
          <p class="edi-duplicate-body">Do NOT change the Test File option to Production unless you know what you're doing</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="cancelDuplicateType()" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" onclick="duplicateType()">Create New File</button>
      </div>
    </div>
  </div>
</div>
   


   
</div>

<script>

	let runselect = document.getElementById('edi_test_file');
	let selectOriginalClasses = runselect.className;
	function selectChanged(val) {
    	if (val == 'P') {
    		runselect.className = selectOriginalClasses + ' redBorder';
    	}
    	if (val == 'T') {
    		runselect.className = selectOriginalClasses;
    	}
			
	};

	let newObject = {
		protocol : 'X12',
		transactionset: ''
	}
	
	// Add click event to New button  - Inline JS
	var buttons = document.querySelectorAll('.edi-btn-new');
	Array.prototype.slice.call(buttons)
   	 .forEach(function (button) {
			button.addEventListener('click', function (event) {
	
				let myModal = new bootstrap.Modal(document.getElementById('edi-new-modal'));					
				myModal.show();
	
			});
		});
			
	 function cancelNewType() {
		myModal.dismiss();
	 }
			
			
	
   // Add click event to copy button
	var buttons = document.querySelectorAll('.edi-btn-copy');
	let ediTypeID = 0;
	
	Array.prototype.slice.call(buttons)
   	 .forEach(function (button) {
   	 	
		button.addEventListener('click', function (event) {
		
//			tooltip.hide()
			
			let buttonID = event.target.id;
			let buttonIDparts = buttonID.split("_");
			var rowID = buttonIDparts[1];
			ediTypeID = rowID;
			
			let ediTypeName = event.target.title;

			var modalTitle = document.getElementById('edi-duplicate-title');
			modalTitle.innerHTML = 'Create "' + ediTypeName + '"'; 
					
			var bodies = document.querySelectorAll('.edi-duplicate-body');
         Array.prototype.slice.call(bodies)
   	 			.forEach(function (bodie) {
					let innerHtml = bodie.innerHTML;
					innerHtml = innerHtml.replace(/@ediTypeName/g, ediTypeName);
               bodie.innerHTML = innerHtml 
				});

			let myModal = new bootstrap.Modal(document.getElementById('edi-duplicate-modal'));					
			myModal.show();
            
       })    
                 	 

   	 });	

	 function cancelDuplicateType() {
		myModal.dismiss();
	 }

	function duplicateType() {
		var existingModal = new bootstrap.Modal(document.getElementById('edi-duplicate-modal'));
	   existingModal.dispose();
		alert('inside duplicateType ' + ediTypeID);
	
	}
	
	

</script>



@endsection

   
