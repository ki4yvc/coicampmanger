/* Simple script created by -- cesarherreralic
   you can find me on 
   http://fiverr.com/cesarherreralic
   email: cesarherreralic@gmail.com
*/

//$(document).ready(function(){



function open_modal(question, url, ajax = false, method = false){
	console.log('calling open_modal');
	$('#modalyn .textcontent').html(question);

	if(ajax){

		if(method === false){
			method = 'POST';
		}

		//add <button type="button"></button> with function that handle ajax 
		$('#modalyn .yes').attr('onclick', "send_a_request('"+url+"', '"+method+"')");

	}else{
		
		//add <a></a> with link to url
		$('#modalyn .yes').html('<a class="btn btn-small btn-primary" href="'+url+'">yes</a>');
	}

	$('#modalyn').modal("show");

}


// function close_modal(){
// 	$('#modalyn').modal("hide");
// }


function send_a_request(url, method = false){
	console.log('calling send_a_request');
	//
	console.log(url);
	console.log(method);
}



//});