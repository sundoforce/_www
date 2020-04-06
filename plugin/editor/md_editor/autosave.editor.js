function get_editor_wr_content()
{
    return editor_wr_content.getMarkdown();
}

function put_editor_wr_content(content)
{
    editor_wr_content.setMarkdown(content);
    return;
}