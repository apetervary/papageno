<?php if( !defined('FW') ) die('Forbidden');
$options = array(
    'podcast_options' => array(
        'type' => 'box',
        'title' => __('Podcast Options', 'miraculous'),
        'options' => array(
            'podcast_songs' => array(
                'type'  => 'select-multiple',
                'label' => __('Song Name', 'miraculous'),
                'desc'  => __('Select Songs you wish to assign for this podcast.', 'miraculous'),
                'help'  => __('Help tip', 'miraculous'),
                'choices' => miraculous_get_all_songs_name_for_album_post(),
            ),
            'podcast_artists' => array(
                'type'  => 'select-multiple',
                'label' => __('Artist Name', 'miraculous'),
                'desc'  => __('Select Artists you wish to assign for this podcast.', 'miraculous'),
                'help'  => __('Help tip', 'miraculous'), 
                'choices' => miraculous_get_all_songs_name_for_album_post(),
            ),
            'podcast_release_date' => array(
                'type'  => 'date-picker',
                'label' => __('Release Date', 'miraculous'),
                'help'  => __('Help tip', 'miraculous'),
                'monday-first' => true, // The week will begin with Monday; for Sunday, set to false
                'min-date' => date('d-m-Y'), 
                'max-date' => null, 
            ),
            'podcast_company_name' => array(
                'type' => 'text',
                'label' => __('Company Name', 'miraculous'),
                'help'  => __('Help tip', 'miraculous'),
            ),
            'post-sidebar' => array(
                'label'   => esc_html__( 'Post Sidebar Position', 'miraculous' ),
                'type'    => 'image-picker',
                'value'   => 'full',
                'desc'    => esc_html__( 'Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.',
                    'miraculous' ),
                'choices' => array(
                    'full' => array(
                        'small' => array(
                            'height' => 50,
                            'src'    => get_template_directory_uri() . '/assets/images/1c.png'
                        ),
                    ),
                    'left' => array(
                        'small' => array(
                            'height' => 50,
                            'src'    => get_template_directory_uri() . '/assets/images/2cl.png'
                        ),
                    ),
                    'right' => array(
                        'small' => array(
                            'height' => 50,
                            'src'    => get_template_directory_uri() . '/assets/images/2cr.png'
                        ),
                    ),
                ),
            ),
            'post_breadcrumbs_switch' => array( 
                'type'  => 'switch',
                'value' => 'on',
                'label' => esc_html__('Breadcrumbs Enable/Disable', 'miraculous'),
                    'left-choice' => array(
                        'value' => 'off',
                        'label' => esc_html__('Off', 'miraculous'),
                    ),
                        'right-choice' => array(
                        'value' => 'on',
                        'label' => esc_html__('On', 'miraculous'),
                    ),
            ),
            'post_bgimages_switch' => array( 
                'type'  => 'switch',
                'value' => 'on',
                'label' => esc_html__('Background Image Enable/Disable', 'miraculous'),
                    'left-choice' => array(
                        'value' => 'off',
                        'label' => esc_html__('Off', 'miraculous'),
                    ),
                        'right-choice' => array(
                        'value' => 'on',
                        'label' => esc_html__('On', 'miraculous'),
                    ),
            ),
            'single_bg_images'  => array(
                'type'  => 'upload',
                'value' => '',
                'images_only' => true,
                'label' => __('Background Image', 'miraculous'),
                'desc'  => __('Upload Background Image', 'miraculous'),
                ),
        ),
    ),
);