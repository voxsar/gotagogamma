/**
 * @license Copyright (c) 2014-2021, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
import InlineEditor from '@ckeditor/ckeditor5-editor-inline/src/inlineeditor.js';
import Autoformat from '@ckeditor/ckeditor5-autoformat/src/autoformat.js';
import BlockQuote from '@ckeditor/ckeditor5-block-quote/src/blockquote.js';
import Bold from '@ckeditor/ckeditor5-basic-styles/src/bold.js';
import Essentials from '@ckeditor/ckeditor5-essentials/src/essentials.js';
import FontFamily from '@ckeditor/ckeditor5-font/src/fontfamily.js';
import FontSize from '@ckeditor/ckeditor5-font/src/fontsize.js';
import Heading from '@ckeditor/ckeditor5-heading/src/heading.js';
import Indent from '@ckeditor/ckeditor5-indent/src/indent.js';
import Italic from '@ckeditor/ckeditor5-basic-styles/src/italic.js';
import List from '@ckeditor/ckeditor5-list/src/list.js';
import Paragraph from '@ckeditor/ckeditor5-paragraph/src/paragraph.js';
import PasteFromOffice from '@ckeditor/ckeditor5-paste-from-office/src/pastefromoffice.js';
import RemoveFormat from '@ckeditor/ckeditor5-remove-format/src/removeformat.js';
import TextTransformation from '@ckeditor/ckeditor5-typing/src/texttransformation.js';

class Editor extends InlineEditor {}

// Plugins to include in the build.
Editor.builtinPlugins = [
	Autoformat,
	BlockQuote,
	Bold,
	Essentials,
	FontFamily,
	FontSize,
	Heading,
	Indent,
	Italic,
	List,
	Paragraph,
	PasteFromOffice,
	RemoveFormat,
	TextTransformation
];

// Editor configuration.
Editor.defaultConfig = {
	toolbar: {
		items: [
			'heading',
			'|',
			'fontFamily',
			'fontSize',
			'|',
			'bold',
			'italic',
			'bulletedList',
			'numberedList',
			'removeFormat',
			'|',
			'outdent',
			'indent',
			'|',
			'blockQuote',
			'undo',
			'redo'
		]
	},
	language: 'en'
};

export default Editor;
