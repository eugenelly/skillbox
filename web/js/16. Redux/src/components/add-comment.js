import React from 'react'

const AddComment = (props) => {
    const {new_comment, addComment, setNewComment} = props

    return (
        <div>
            <input type="text"
                   placeholder="Автор"
                   value={new_comment.author}
                   onChange={ev => {
                       setNewComment(ev.target.value, new_comment.text)
                   }}
            />
            <input type="text"
                   placeholder="Текст"
                   value={new_comment.text}
                   onChange={ev => {
                       setNewComment(new_comment.author, ev.target.value)
                   }}
            />
            <button type="button"
                    onClick={ev => {
                        if (new_comment.author !== '' && new_comment.text !== '')
                            addComment(
                                new_comment.author,
                                new_comment.text,
                                new Date().toLocaleTimeString("ru-RU")
                            )
                        setNewComment('', '')
                    }}
            >Добавить комментарий
            </button>
        </div>
    )
}

export default AddComment