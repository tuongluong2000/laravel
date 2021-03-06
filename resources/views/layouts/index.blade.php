<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/png" href="/img/logo.jpg" />
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    .grid-container {
        display: inline-grid;
        grid-template-columns: auto auto auto;
        position: relative;
        margin: auto;
        margin-left: 15%;
    }

    .grid-item {
        margin: 20px;
        width: 350px;
    }

    .topic {
        text-align: center;
    }

    .title {
        text-align: center;
    }

    .description {
        text-align: center;
        color: #003300;
    }

    .btn-control {
        display: flex;
        margin-left: 48px;
        margin-bottom: 5px;
    }

    .btn btn-danger {}
    </style>
</head>

<body>
    <div class="grid-container">
        @foreach($products as $product)
        @if($product->quantity>0)
        <!-- //<h5 class="card-title">Loại sản phẩm: {{$product->nametype}}</h5>	 -->
        <div class="grid-item">
            <div class="card">
                <form action="{{'user/'.$product->id.'/show'}}" method="post">
                    @csrf
                    <button >
                        <img src="storage/{{$product->image}}"class="card-img-top" width="100px" height="200px" >
                    </button>
                </form>
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">Số lượng: {{$product->quantity}}</p>
                    <p class="card-text">{{$product->price}} đồng</p>
                    <p class="card-text" style="text-decoration: line-through;">{{$product->oldprice}} đồng</p>
                </div>
                <div class="action" style="display: flex;
			margin-left: 50px;
			margin-bottom: 5px;">
                    @if(Auth::user())
                    <form action="{{'cart/'.$product->id}}" method="get">
                        <button><img src="img/cart.png"></button></form>
                    @else
                    <form action="/auth/login" method="get">
                        <button type="submit"><img src="img/login.png" width="25px" title="Login"></button>
                    </form>
                    @endif
                    <form action="{{'user/'.$product->id.'/show'}}" method="post" style="margin-left: 50px;">
                    @csrf
                        <button>Chi tiết</button></form>
                </div>
            </div>
        </div>

        @endif
        @endforeach
    </div>


    <button onclick="topFunction()" id="myBtn" title="Go to top" style="
    position: fixed;
    right:0px;
    top:100px;
    border-radius: 25px;
    width: 50px;
height: 50px;
padding: 10px 16px;
font-size: 18px;
line-height: 1.33;">^</button>
    <script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }

    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {

        $('html, body').animate({
            scrollTop: 0
        }, 'slow');
    }
    </script>
</body>

</html>
