$('#medical_consultation').change(function(){
	const selectValue=this.value;
	if (selectValue) {
		const medical_consultation=medical_consultations.find(medical_consultation=>medical_consultation.id==selectValue);
		let resul=[];
		doctors.forEach(doctor=>{
			if(medical_consultation.specialty_id==doctor.specialty_id){
				resul.push(
					`<option value='${doctor.id}'>${doctor.user.name} ${doctor.user.last_name}</option>`
				);
			}
		});
		$('#doctor').html(resul);
		$('#doctor').attr("disabled",false);
	}
	else{
		$('#doctor').html(`<option value=''>--asignar doctor--</option>`);
		$('#doctor').attr("disabled",true);
	}
});