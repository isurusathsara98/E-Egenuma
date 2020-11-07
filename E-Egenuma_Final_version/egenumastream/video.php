
<!DOCTYPE html>
<?php
$u=$_GET['teacher'];
$gra=$_GET['grade'];
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<style>
    body{
    background: linear-gradient(rgba(0, 0, 50, 0.5),rgba(0, 0, 50, 0.5)),url(img/back.jpg);
    background-size: cover;
    background-position: center;
}
   .button {
  position: absolute;

  background-color: #4CAF50; /* Green */
  border: none;
  color: rgba(255, 255, 255, 0);
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: "Times New Roman";
  font-size: 24px;
  margin:8px 2px;
  transition-duration: 0.5s;
  cursor: pointer;
  border-radius: 6px;
  
}
.button3 {
  left:1130px;top:20px;
  background-color: rgba(184, 233, 50, 0.616);
  color: rgb(77, 137, 247);
  border: 2px solid #59c4ee;
  box-shadow: 0 6px 8px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

.button3:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  background-color: #f3c704;
  color: white;
}

</style>
<script>
    function back(){
        var val = "<?php echo $u ?>";
        var gra = "<?php echo $gra ?>";
        location.replace("../teacherstudents.php?username="+val+"&grade="+gra+"");
    }
</script>
    <button onclick="back()" class="button button3" ><-Back</button>
<head>
    <title>E-EGENUMA</title>
   
</head>
<body>

<p align="center">
<?php?>


<div class="container">
<div class="row">
      
<div class="number">
            <div id="my-number-section" class="text-center">
                <div id="my-number">LOADING</div>
                <div id="my-number-title" class="hidden-sm hidden-xs">
                    
                </div>
                <div id="my-number-permalink">
                    <span class="glyphicon glyphicon-link"></span>
                    call link:
                    <a id="my-number-link" href="...">http://...</a>
                </div>
            </div>
</div>

       
       
             <div>
            <video id="gum-local" autoplay></video>
<script src="js/main.js"></script>   
<div class="row"></div>
        </div>
        <div><div id="pubnub-chat-section" class="text-center">
  <input id="pubnub-chat-input" type="text" placeholder="chat here">
  <div id="pubnub-chat-output">
    <div></div>
  </div>
</div></div>
</body>&nbsp;</div>
    </div>
</div>


<script src="https://cdn.pubnub.com/pubnub-dev.js"></script>
<script src="js/webrtc.js"></script>

<script>(function(){


var urlargs         = urlparams();
var my_number       = PUBNUB.$('my-number');
var my_link         = PUBNUB.$('my-number-link');
var number          = urlargs.number || Math.floor(Math.random()*999+1);

my_number.number    = number;
my_number.innerHTML = ''+my_number.number;
my_link.href        = location.href.split('?')[0] + '?call=' + number;
my_link.innerHTML   = my_link.href;


if (!('number' in urlargs)) {
    urlargs.number = my_number.number;
    location.href = urlstring(urlargs);
    return;
}


function urlparams() {
    var params = {};
    if (location.href.indexOf('?') < 0) return params;

    PUBNUB.each(
        location.href.split('?')[1].split('&'),
        function(data) { var d = data.split('='); params[d[0]] = d[1]; }
    );

    return params;
}


function urlstring(params) {
    return location.href.split('?')[0] + '?' + PUBNUB.map(
        params, function( key, val) { return key + '=' + val }
    ).join('&');
}


var video_out = PUBNUB.$('video-display');
var img_out   = PUBNUB.$('video-thumbnail');
var img_self  = PUBNUB.$('video-self');

var phone     = window.phone = PHONE({
    number        : my_number.number, 
    publish_key   : 'pub-c-561a7378-fa06-4c50-a331-5c0056d0163c',
    subscribe_key : 'sub-c-17b7db8a-3915-11e4-9868-02ee2ddab7fe',
    ssl           : true
});

function connected(session) {
    video_out.innerHTML = '';
    video_out.appendChild(session.video);

    PUBNUB.$('number').value = ''+session.number;
    sounds.play('sound/hi');
    console.log("Hi!");
}



function set_icon(icon) {
    video_out.innerHTML = '<span class="glyphicon glyphicon-' +
        icon + '"></span>';
}
function get_xirsys_servers() {
    var servers;
    $.ajax({
        type: 'POST',
        url: 'https://api.xirsys.com/getIceServers',
        data: {
            room: 'default',
            application: 'default',
            domain: 'www.pubnub-example.com',
            ident: 'pubnub',
            secret: 'dec77661-9b0e-4b19-90d7-3bc3877e64ce',
        },
        success: function(res) {
            res = JSON.parse(res);
            if (!res.e) servers = res.d.iceServers;
        },
        async: false
    });
    return servers;
}



phone.ready(function(){

    set_icon('facetime-video');

    if ('call' in urlargs) {
        var number = urlargs['call'];
        PUBNUB.$('number').value = number;
        dial(number);
    }


    PUBNUB.bind( 'mousedown,touchstart', PUBNUB.$('dial'), function(){
        var number = PUBNUB.$('number').value;
        if (!number) return;
        dial(number);
    } );

    PUBNUB.bind( 'mousedown,touchstart', PUBNUB.$('hangup'), function() {
        phone.hangup();
        set_icon('facetime-video');
    } );

   
});


function thumbnail(session) {
    img_out.innerHTML = '';
    img_out.appendChild(session.image);
    img_out.appendChild(phone.snap().image);
}


phone.receive(function(session){
    session.message(message);
    session.thumbnail(thumbnail);
    session.connected(connected);
    session.ended(ended);
});


var chat_in  = PUBNUB.$('pubnub-chat-input');
var chat_out = PUBNUB.$('pubnub-chat-output');


PUBNUB.bind( 'keydown', chat_in, function(e) {
    if ((e.keyCode || e.charCode) !== 13)     return true;
    if (!chat_in.value.replace( /\s+/g, '' )) return true;

    phone.send({ text : chat_in.value });
    add_chat( my_number.number + " (Me)", chat_in.value );
    chat_in.value = '';
} )


function add_chat( number, text ) {
    if (!text.replace( /\s+/g, '' )) return true;

    var newchat       = document.createElement('div');
    newchat.innerHTML = PUBNUB.supplant(
        '<strong>{number}: </strong> {message}', {
        message : safetxt(text),
        number  : safetxt(number)
    } );
    chat_out.insertBefore( newchat, chat_out.firstChild );
}


function message( session, message ) {
    add_chat( session.number, message.text );
}


function safetxt(text) {
    return (''+text).replace( /[<>]/g, '' );
}


})();</script>

</body>
</html>
