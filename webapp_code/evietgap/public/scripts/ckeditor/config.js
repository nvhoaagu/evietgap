/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = 'http://cict.agu.edu.vn/apps/qlktx/public/scripts/ckfinder/ckfinder.html';
 
	config.filebrowserImageBrowseUrl = 'http://cict.agu.edu.vn/apps/qlktx/public/scripts/ckfinder/ckfinder.html?type=Images';
	 
	config.filebrowserFlashBrowseUrl = 'http://cict.agu.edu.vn/apps/qlktx/public/scripts/ckfinder/ckfinder.html?type=Flash';
	 
	config.filebrowserUploadUrl = 'http://cict.agu.edu.vn/apps/qlktx/public/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	 
	config.filebrowserImageUploadUrl = 'http://cict.agu.edu.vn/apps/qlktx/public/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	 
	config.filebrowserFlashUploadUrl = 'http://cict.agu.edu.vn/apps/qlktx/public/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
