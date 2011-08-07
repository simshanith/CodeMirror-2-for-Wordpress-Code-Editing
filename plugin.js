jQuery(document).ready(function() {

    var span = jQuery('h3 span');
    
    if ('0' != span.length) {
      //theme editor
      var file = span.html();
      file = file.replace( /\(|\)/g, '');
    } else {
      //plugin editor
      file = jQuery('input[name="file"]').val();
    }
  file = file.split('.');
  mode = file[1];
  if (mode != 'php') 
    mode = 'css';
  
  var textarea = document.getElementById("newcontent");
  if (textarea) {
    var editor = CodeMirror.fromTextArea(textarea, {
      theme: "elegant",
      mode: mode,
      lineNumbers: true,
      onKeyEvent: function(i, e) {
        // Hook into F11
        if ((e.keyCode == 122 || e.keyCode == 27) && e.type == "keydown") {
          e.stop();
          return toggleFullscreenEditing();
        }
      },
    });

    function toggleFullscreenEditing() {
        var editorDiv = jQuery(".CodeMirror-scroll");
        if (!editorDiv.hasClass("fullscreen")) {
          toggleFullscreenEditing.beforeFullscreen = {
            height: editorDiv.height(),
            width: editorDiv.width()
          }
          editorDiv.addClass("fullscreen");
          editorDiv.height("100%");
          editorDiv.width("100%");
          editor.refresh();
        } else {
          editorDiv.removeClass("fullscreen");
          editorDiv.height(toggleFullscreenEditing.beforeFullscreen.height);
          editorDiv.width(toggleFullscreenEditing.beforeFullscreen.width);
          editor.refresh();
        }
    }
  }
});
