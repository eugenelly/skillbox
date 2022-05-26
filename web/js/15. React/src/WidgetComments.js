import React from "react"
import CommentItem from "./comment-item";

class WidgetComments extends React.Component {
    constructor() {
        super(undefined)

        this.state = {
            comments: [],
            new_comment: {
                author: '',
                text: '',
                time: null
            }
        }

        if (localStorage.getItem('comments')) {
            this.state.comments = JSON.parse(localStorage.getItem('comments'))
        } else {
            this.state.comments = [{
                author: 'Eugene',
                text: 'Im a web-developer',
                time: new Date().toLocaleTimeString("ru-RU")
            }]
        }

        this.saveLocal()
    }

    addComment() {
        if (this.state.new_comment.author === ""
            || this.state.new_comment.text === ""
        ) {
            return;
        }

        const comments = this.state.comments;

        comments.push({
            author: this.state.new_comment.author,
            text: this.state.new_comment.text,
            time: new Date().toLocaleTimeString("ru-RU")
        })

        this.saveLocal()
        this.setState({
            comments,
            new_comment: {
                author: '',
                text: '',
                time: null
            }
        })
    }

    deleteComment(num) {
        const comments = this.state.comments

        comments.splice(num, 1)

        this.saveLocal()
        this.setState({comments})
    }

    saveLocal() {
        const comments = this.state.comments

        localStorage.setItem('comments', JSON.stringify(comments))
    }

    render() {
        return (
            <div>
                <h2>Comments List</h2>
                <input type="text"
                       placeholder="Автор"
                       name="author"
                       value={this.state.new_comment.author}
                       onChange={ev => {
                           this.setState(
                               {
                                   new_comment:
                                       {
                                           author: ev.target.value,
                                           text: this.state.new_comment.text
                                       }
                               })
                       }}
                />
                <input type="text"
                       placeholder="Текст"
                       name="text"
                       value={this.state.new_comment.text}
                       onChange={ev => {
                           this.setState(
                               {
                                   new_comment:
                                       {
                                           author: this.state.new_comment.author,
                                           text: ev.target.value
                                       }
                               })
                       }}
                />
                <button type="button"
                        onClick={ev => {
                            this.addComment()
                        }}
                >Добавить комментарий
                </button>
                <ol>
                    {
                        this.state.comments.map((comment, num) => {
                            return (
                                <CommentItem author={comment.author}
                                             text={comment.text}
                                             time={comment.time}
                                             deleteComment={this.deleteComment.bind(this, num)}
                                />
                            )
                        })
                    }
                </ol>
            </div>
        )
    }
}

export default WidgetComments