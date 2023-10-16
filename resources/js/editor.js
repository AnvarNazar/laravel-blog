import './bootstrap';
import Alpine from 'alpinejs';

import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import Link from '@editorjs/link';
import Raw from '@editorjs/raw';
import ImageTool from '@editorjs/image';
import CheckList from '@editorjs/checklist';
import List from '@editorjs/list';
import Embed from '@editorjs/embed';
import Quote from '@editorjs/quote';


const editor = new EditorJS({
    /**
     * Id of Element that should contain Editor instance
     */
    holder: 'editorjs',
    tools: {
        header: Header,
        link: Link,
        raw: Raw,
        checkList: CheckList,
        list: List,
        embed: Embed,
        quote: Quote,
        image: {
            class: ImageTool,
            config: {
                uploader: {
                    uploadByFile(file) {
                        const formData = new FormData();
                        formData.set("image", file);
                        formData.set("name", "image file");
                        return axios
                            .post("/images/store", formData)
                            .then((response) => {
                                console.log(response.data);
                                return response.data;
                            })
                    },
                }
            }
        }
    }
});

window.save = function (event) {
    event.preventDefault();
    const postStore = Alpine.store('post');
    editor.save().then((outputData) => {
        const formData = new FormData();
        formData.set("title", postStore.title);
        formData.set("slug", postStore.slug);
        formData.set("content", JSON.stringify(outputData));
        formData.set("is_published", postStore.is_published ? "1" : "0");
        axios.post("/admin/post/store", formData).then((response) => {
            window.location = "/admin/posts";
        });
    }).catch((error) => {
        console.error('Saving failed: ', error);
    })
}

Alpine.store('post', {
    id: 0,
    title: '',
    slug: '',
    content: '',
    is_published: true
});
window.Alpine = Alpine
Alpine.start()
