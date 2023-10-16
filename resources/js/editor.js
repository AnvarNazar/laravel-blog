import './bootstrap';

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
