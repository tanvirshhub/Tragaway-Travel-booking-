<?php
function themfic_import() {
    return [
      [
        'import_file_name'             => 'Demo Import',
        'categories'                   => [ 'New category', 'Old category' ],
        'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo-content/test-task-demo-content.xml',
        'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo-content/test-task-import_widget_file.wie',
        'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/demo-content/test-task-import_customizer_file.dat',
        'import_notice'                => __( 'After you import this demo, you will have to setup the slider manually.', 'themefic-task'    
      ),
      ],
    ];
  }
  add_filter( 'ocdi/import_files', 'themfic_import' );