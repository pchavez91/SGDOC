// Ajax File upload with jQuery and XHR2
// Sean Clark http://square-bracket.com
// xhr2 file upload
// data is optional
$.fn.upload_multiple = function(remote, data, successFn, progressFn,cont) {
    // if we dont have post data, move it along
    if (typeof data != "object") {
        progressFn = successFn;
        successFn = data;
    }
	
	    //console.log(remote);
	    //console.log(data);
	    //console.log(successFn);
	    //console.log(progressFn);
		//console.log(cont);
		
    return this.each(function() {
	var a=cont;
	
	    //console.log($(this));
		//console.log($(this)[0]);
		//console.log($(this)[0].files[0]);
		//console.log($(this)[0].files[1]);
	    
		//for (var a = 0; a < cont; a++){ 
		
	     if ($(this)[0].files[a]) {
		
            var formData = new FormData();
			formData.append($(this).attr("name"), $(this)[0].files[a]);
            
			var nombre_doc=$(this)[0].files[a].name;
			//console.log($(this)[0].files[a].name);
            
			// if we have post data too
            if (typeof data == "object") {
                for (var i in data) {
                    formData.append(i, data[i]);
                }
            }

            // do the ajax request
            $.ajax({
                url: remote,
                type: 'POST',
                xhr: function() {
                    myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload && progressFn) {
                        myXhr.upload.addEventListener('progress', function(prog) {
                            var value = ~~((prog.loaded / prog.total) * 100);

                            // if we passed a progress function
                            if (progressFn && typeof progressFn == "function") {
                                progressFn(prog, value);

                                // if we passed a progress element
                            } else if (progressFn) {
                                $(progressFn).val(value);
                            }
                        }, false);
                    }
                    return myXhr;
                },
                data: formData,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var json;
                    try {
                        json = JSON.parse(res.responseText);
                    } catch (e) {
                        json = res.responseText;
                    }
                    if (successFn)
                        successFn(json,nombre_doc);
                }
            });
        }
		//}
    });
};