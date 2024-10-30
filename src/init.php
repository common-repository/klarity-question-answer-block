<?php

if (!defined('ABSPATH')) {
    exit;
}

function question_answer_block_assets() {
    wp_enqueue_style(
        'question_answer_block-cgb-style-css',
        plugins_url('dist/blocks.style.build.css', __DIR__),
        ['wp-editor'],
        filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' )
    );
}

add_action('enqueue_block_assets', 'question_answer_block_assets');

function question_answer_block_editor_assets() {
    wp_enqueue_script(
        'question_answer_block-js',
        plugins_url('/dist/blocks.build.js', __DIR__),
        ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'],
      filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' )
    );

    wp_enqueue_style(
        'question_answer_block-editor-css', // Handle.
        plugins_url('dist/blocks.editor.build.css', __DIR__),
        ['wp-edit-blocks'],
        filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' )
    );
}

add_action('enqueue_block_editor_assets', 'question_answer_block_editor_assets');

register_block_type('klarity/klarity-question-answer-block', [
    'render_callback' => 'render_question_answer',
    'attributes' => [
        'question' => [
            'type' => 'string',
            'default' => '',
        ],
        'answer' => [
            'type' => 'string',
            'default' => '',
        ]
    ]
]);


function render_question_answer( $attributes ) {
    $question = $attributes['question'] ?? '';
    $answer = $attributes['answer'] ?? '';
    wp_enqueue_script(
        'question-answer-block-handler-js',
        plugins_url('/src/block/toggle-expand-answer.js', __DIR__),
        [], // Dependencies, defined above.
        true // Enqueue the script in the footer.
    );
	return (
		'<div>
      <div class="question-answer-container text-left card" onclick="toggleExpandAnswer(this)">
        <div class="question-container">
          <p>'. $question .'</p>
          <div class="chevron-container chevron-down">
        </div>
        </div>
        <div class="answer-container collapsed">
          <p>'. $answer .'</p>
          <div class="empty-div"></div>
        </div>
		  </div>
    </div>'
	);
}
