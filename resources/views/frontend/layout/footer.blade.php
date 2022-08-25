<!-- footer bottom -->
<div class="footer_bottom p-3">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0">
                    Copyright &copy; <span id="year"></span>
                    <span class="site_name">theExamly</span> . All
                    Rights Reserved
                </p>
            </div>
        </div>
    </div>
</div>
</section>
<!-- js -->
{!! Html::script('/js/frontend/jquery-3.5.1.min.js') !!}
{!! Html::script('/js/frontend/popper.min.js') !!}
{!! Html::script('/js/frontend/bootstrap.min.js') !!}
@stack('plugin-scripts')
{!! Html::script('/js/frontend/common.js') !!}
@stack('special-scripts')
</body>

</html>