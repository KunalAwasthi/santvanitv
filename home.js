
$.ajax({
    type: "GET",
    url: "/santvanitv/back-api.php",
    data: {QTYPE:'101', ord:'viewCount', maxResults:'3', req_stats: '1'},
    async:true,
    crossDomain:true,
    dataType : 'JSON',
    success: function(data){
        $.each(data,
            function(i,item)
            {   var dur = item.duration;
                dur = convert_time(dur);
                var data = '<div class="col-md-4 resent-grid recommended-grid slider-top-grids"><div class="resent-grid-img recommended-grid-img"><a href="single.php?id='+item.id+'"><img style="max-height" src="http://img.youtube.com/vi/'+item.id+'/0.jpg" alt="" /></a><div class="time"><p>'+dur+'</p></div><div class="clck"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div></div><div class="resent-grid-info recommended-grid-info"><h3><a href="single.php?id='+item.id+'" class="title title-info">'+item.title+'</a></h3><p class="views views-info">'+item.viewCount+' views</p></div></div>';
                $('.all-grids').append(data);
        }); 
    },
    error: function(data){
        alert(data.status + " error");
    }
  });
  function convert_time(duration) {
    var a = duration.match(/\d+/g);

    if (duration.indexOf('M') >= 0 && duration.indexOf('H') == -1 && duration.indexOf('S') == -1) {
        a = [0, a[0], 0];
    }

    if (duration.indexOf('H') >= 0 && duration.indexOf('M') == -1) {
        a = [a[0], 0, a[1]];
    }
    if (duration.indexOf('H') >= 0 && duration.indexOf('M') == -1 && duration.indexOf('S') == -1) {
        a = [a[0], 0, 0];
    }

    duration = "";

    if (a.length == 3) {
        duration += parseInt(a[0])+ "h:";
        duration +=  parseInt(a[1]) + "m:";
        duration += parseInt(a[2]) + "s";
    }

    if (a.length == 2) {
        duration = duration + 0 + "h:";
        duration = duration + parseInt(a[0]) + "m:";
        duration = duration + parseInt(a[1]) + "s";
    }

    if (a.length == 1) {
        duration = duration + parseInt(a[0]) + "s";
    }
    return duration
}
    console.log(0);






    $.ajax({
        type: "GET",
        url: "/santvanitv/back-api.php",
        data: {QTYPE:'101', ord:'viewCount', maxResults:'10', req_stats: '1'},
        async:true,
        crossDomain:true,
        dataType : 'JSON',
        success: function(data){
            var append_text = "";
            var iter = 0;
            $.each(data,
                function(i,item)
                {
                
                if(iter == 0 || iter == 4 ) append_text += "<li>";
                    
                
                var dur = item.duration;
                dur = convert_time(dur);
                
                
                append_text += '<div class="animated-grids">';
    
                append_text += '<div class="col-md-3 resent-grid recommended-grid slider-first"><div class="resent-grid-img recommended-grid-img"><a href="single.html"><img src="http://img.youtube.com/vi/'+item.id+'/0.jpg" alt="'+item.title+'" /></a><div class="time small-time slider-time"><p>'+dur+'</p></div><div class="clck small-clck"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div></div><div class="resent-grid-info recommended-grid-info"><h5><a href="single.html" class="title">'+item.title+'</a></h5><div class="slid-bottom-grids"><div class="slid-bottom-grid slid-bottom-right"><p class="views views-info">'+item.viewCount+' views</p> </div><div class="clearfix"> </div></div> </div></div>';
                        
                append_text += '</div>';
                
                if(iter == 3 || iter == 7 ) append_text += "<li>";
                
                iter++;
            });
            $('#slider3').append(append_text);
            
        },
        error: function(data){
            alert(data.status + " error");
        }
      });

             
