import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

window.setupEditor = function(content) {
  return {
    content: content,
    updatedAt: Date.now(), // force Alpine to rerender on selection change
    init(element) {
      window.editor = new Editor({
        element: element,
        extensions: [
          StarterKit,
        ],
        content: this.content,
        onUpdate: ({ editor }) => {
          this.content = editor.getHTML()
        },
        onSelectionUpdate: () => {
          this.updatedAt = Date.now()
        },
      })
    },
  }
}