<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    {!! Html::style('/css/frontend/css/bootstrap.min.css') !!}
    {!! Html::style('/css/frontend/css/all.min.css') !!}

    <!-- custom css -->
    {!! Html::style('/css/frontend/css/style.css') !!}
    <style>
        .error_404 {
  padding: 100px 0px;
}
.error_404_content h2 {
  font-family: "Roboto", sans-serif;
  color: #ff8917;
  font-size: 120px;
  font-weight: 700;
  text-transform: uppercase;
}
.error_404_content h3 {
  font-family: "Roboto", sans-serif;
  color: #ff8917;
  font-size: 50px;
  font-weight: 400;
}
.error_404_content p {
  font-size: 16px;
  font-weight: 400;
  color: #343a40;
  line-height: 1.2;
}
.error_404_content a {
  color: #ffffff;
  padding: 10px 35px;
  border-color: #ff8917;
  background-color: #ff8917;
}
.error_404_content a i {
  margin-right: 5px;
}
.error_404_content a:focus {
  border-color: #ff8917 !important;
  box-shadow: 0 0 0 0.2rem rgba(255, 137, 23, 0.5) !important;
}
.error_404_content a:hover {
  color: #ffffff;
  border-color: #ff8917;
  background-color: #ff8917;
}
    </style>

    <title>theExamly</title>
  </head>
  <body>
    
    <!-- page title -->
    
      <!-- 404 -->
      <section class="error_404">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="error_404_content text-center">
                <h2>404</h2>
                <h3>Oops! Page Not Found!</h3>
                <p>
                  It looks like nothing was found at this location. Click the link
                  below to return home
                </p>
                <a class="btn" href="{{ route('frontend.index') }}"
                  ><i class="fas fa-reply"></i>Back to Home</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>
    

    
    <!-- js -->
    {!! Html::script('/js/frontend/jquery-3.5.1.min.js') !!}
    {!! Html::script('/js/frontend/popper.min.js') !!}
    {!! Html::script('/js/frontend/bootstrap.min.js') !!}
    {!! Html::script('/js/frontend/common.js') !!}
  </body>
</html>
