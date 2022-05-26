import React from 'react';

const CommentItem = (props) => {
    return (
        <li>
            <button type="button"
                    onClick={props.deleteComment}
            >Удалить
            </button>   
            {props.author} "{props.text}" {props.time}
        </li>
    )
}

export default CommentItem;