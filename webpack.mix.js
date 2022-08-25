const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css').sourceMaps(true, 'source-maps')
    .browserSync({
      proxy: '127.0.0.1:8000',
      port: 3100,
      ghostMode: false,
      notify: false
    });


// Copy plugin files to public folder
mix.copyDirectory('node_modules/@mdi', 'public/assets/plugins/@mdi')
  // .copyDirectory('node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js', 'public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')
  .copyDirectory(['node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js', 'node_modules/perfect-scrollbar/css/perfect-scrollbar.css'] , 
    'public/assets/plugins/perfect-scrollbar')
  .copyDirectory('node_modules/progressbar.js/dist/progressbar.min.js', 'public/assets/plugins/progressbarjs/progressbar.min.js')
  .copyDirectory(['node_modules/dragula/dist/dragula.min.css', 'node_modules/dragula/dist/dragula.min.js'] , 
    'public/assets/plugins/dragula')
  .copyDirectory('node_modules/sweetalert/dist/sweetalert.min.js', 'public/assets/plugins/sweetalert/sweetalert.min.js')
  .copyDirectory('node_modules/jquery.avgrund/jquery.avgrund.min.js', 'public/assets/plugins/jquery-avgrund/jquery.avgrund.min.js')
  .copyDirectory('node_modules/clipboard/dist/clipboard.min.js', 'public/assets/plugins/clipboard/clipboard.min.js')
  .copyDirectory(['node_modules/jquery-contextmenu/dist/jquery.contextMenu.min.js', 'node_modules/jquery-contextmenu/dist/jquery.contextMenu.min.css'] , 
    'public/assets/plugins/jquery-contextmenu')
  .copyDirectory(['node_modules/nouislider/distribute/nouislider.min.js', 'node_modules/nouislider/distribute/nouislider.min.css'] , 
    'public/assets/plugins/nouislider')
  .copyDirectory(['node_modules/ion-rangeslider/js/ion.rangeSlider.min.js', 'node_modules/ion-rangeslider/css/ion.rangeSlider.css'] , 
    'public/assets/plugins/ion-rangeslider')
  .copyDirectory('node_modules/owl-carousel-2', 'public/assets/plugins/owl-carousel-2')
  .copyDirectory('node_modules/jstree/dist', 'public/assets/plugins/jstree')
  .copyDirectory('node_modules/icheck', 'public/assets/plugins/icheck')
  .copyDirectory('node_modules/jquery-bar-rating', 'public/assets/plugins/jquery-bar-rating')
  .copyDirectory('node_modules/jquery-tags-input/dist', 'public/assets/plugins/jquery-tags-input')
  .copyDirectory('node_modules/font-awesome', 'public/assets/plugins/font-awesome')
  .copyDirectory('node_modules/x-editable/dist/bootstrap-editable', 'public/assets/plugins/x-editable')
  .copyDirectory('node_modules/dropify/dist', 'public/assets/plugins/dropify')
  .copyDirectory(['node_modules/jquery-file-upload/js/jquery.uploadfile.min.js', 'node_modules/jquery-file-upload/css/uploadfile.css'],
    'public/assets/plugins/jquery-file-upload')
  .copyDirectory('node_modules/jquery-asColor/dist', 'public/assets/plugins/jquery-asColor')
  .copyDirectory('node_modules/jquery-asColorPicker/dist', 'public/assets/plugins/jquery-asColorPicker')
  .copyDirectory('node_modules/jquery-asGradient/dist', 'public/assets/plugins/jquery-asGradient')
  .copyDirectory('node_modules/bootstrap-datepicker/dist', 'public/assets/plugins/bootstrap-datepicker')
  .copyDirectory('node_modules/tempusdominus-bootstrap-4/build', 'public/assets/plugins/tempusdominus-bootstrap-4')
  .copyDirectory('node_modules/select2/dist', 'public/assets/plugins/select2')
  .copyDirectory('node_modules/typeahead.js/dist/typeahead.bundle.min.js', 'public/assets/plugins/typeaheadjs/typeahead.bundle.min.js')
  .copyDirectory('node_modules/jquery.repeater/jquery.repeater.min.js', 'public/assets/plugins/jqueryrepeater/jquery.repeater.min.js')
  .copyDirectory('node_modules/moment/moment.js', 'public/assets/plugins/moment/moment.js')
  .copyDirectory('node_modules/inputmask/dist/jquery.inputmask.bundle.js', 'public/assets/plugins/inputmask/jquery.inputmask.bundle.js')
  .copyDirectory('node_modules/jquery-validation/dist/jquery.validate.min.js', 'public/assets/plugins/jquery-validation/jquery.validate.min.js')
  .copyDirectory('node_modules/bootstrap-maxlength/dist/bootstrap-maxlength.min.js', 'public/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')
  .copyDirectory('node_modules/jquery-steps/build/jquery.steps.min.js', 'public/assets/plugins/jquery-steps/jquery.steps.min.js')
  .copyDirectory('node_modules/summernote/dist', 'public/assets/plugins/summernote')
  .copyDirectory('node_modules/tinymce', 'public/assets/plugins/tinymce')
  .copyDirectory('node_modules/quill/dist', 'public/assets/plugins/quill')
  .copyDirectory('node_modules/simplemde/dist', 'public/assets/plugins/simplemde')
  .copyDirectory('node_modules/ace-builds/src-min', 'public/assets/plugins/ace-builds')
  .copyDirectory('node_modules/codemirror', 'public/assets/plugins/codemirror')
  .copyDirectory('node_modules/raphael/raphael.min.js', 'public/assets/plugins/raphael/raphael.min.js')
  .copyDirectory('node_modules/chart.js/dist/Chart.min.js', 'public/assets/plugins/chartjs/chart.min.js')
  .copyDirectory(['node_modules/morris.js/morris.min.js', 'node_modules/morris.js/morris.css'],
    'public/assets/plugins/morrisjs')
  .copyDirectory('node_modules/flot', 'public/assets/plugins/flot')
  .copyDirectory('node_modules/chartist/dist', 'public/assets/plugins/chartist')
  .copyDirectory(['node_modules/c3/c3.min.js', 'node_modules/c3/c3.min.css'],
    'public/assets/plugins/c3')
  .copyDirectory('node_modules/d3/dist/d3.min.js', 'public/assets/plugins/d3/d3.min.js')
  .copyDirectory('node_modules/jquery-sparkline/jquery.sparkline.min.js', 'public/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')
  .copyDirectory('node_modules/justgage/dist/justgage.min.js', 'public/assets/plugins/justgage/justgage.min.js')
  .copyDirectory('node_modules/justgage/dist/justgage.min.js', 'public/assets/plugins/justgage/justgage.min.js')
  .copyDirectory('node_modules/datatables.net/js/jquery.dataTables.js', 'public/assets/plugins/datatables.net/jquery.dataTables.min.js')
  .copyDirectory('node_modules/datatables.net-bs4', 'public/assets/plugins/datatables.net-bs4')
  .copyDirectory('node_modules/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js', 'public/assets/plugins/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js')
  .copyDirectory('node_modules/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css', 'public/assets/plugins/datatables.net-fixedcolumns-bs4/fixedColumns.bootstrap4.min.css')
  .copyDirectory('node_modules/jsgrid/dist', 'public/assets/plugins/jsgrid')
  .copyDirectory('node_modules/jquery-toast-plugin/dist', 'public/assets/plugins/jquery-toast-plugin')
  .copyDirectory('node_modules/flag-icon-css', 'public/assets/plugins/flag-icon-css')
  .copyDirectory('node_modules/font-awesome', 'public/assets/plugins/font-awesome')
  .copyDirectory('node_modules/simple-line-icons', 'public/assets/plugins/simple-line-icons')
  .copyDirectory('node_modules/ti-icons', 'public/assets/plugins/ti-icons')
  .copyDirectory('node_modules/jvectormap', 'public/assets/plugins/jvectormap')
  .copyDirectory('node_modules/jquery-mapael/js', 'public/assets/plugins/jquery-mapael')
  .copyDirectory('node_modules/jquery.easing/jquery.easing.min.js', 'public/assets/plugins/jquery.easing/jquery.easing.min.js')
