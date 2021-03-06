const E = window.wangEditor

// 切换语言
const LANG = location.href.indexOf('lang=en') > 0 ? 'en' : 'zh-CN'
E.i18nChangeLanguage(LANG)


window.editor = E.createEditor({
    selector: '#editor-text-area',
    html: '',
    config: {
        placeholder: 'ここに入力してください',
        MENU_CONF: {
            uploadImage: {
                fieldName: 'your-fileName',
                base64LimitSize: 10 * 1024 * 1024 // 10M 以下插入 base64
            }
        },
        onChange(editor) {
            const html = editor.getHtml()
            document.getElementById('article').value = html
        }
    }
})
window.toolbar = E.createToolbar({
    editor,
    selector: '#editor-toolbar',
    config: {
        excludeKeys: [
            "insertVideo",
            "uploadVideo",
            "group-video"
        ]
    }
})
// E.getAllMenuKeys();
console.log(E);
