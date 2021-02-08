import React from 'react';

class AppClass extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            error: null,
            isLoaded: false,
            notes: []
        };
    }

    componentDidMount() {
        fetch('http://127.0.0.1:8000/api/note')
            .then(res => res.json())
            .then(result => {
                this.setState({
                    notes: result,
                    isLoaded: true
                })
            },
            error => {
                this.setState({
                    isLoaded: true,
                    error
                })
            })
    }

    render() {
        const { error, isLoaded, notes } = this.state;
        if (error) {
            return <div>Error: {error.message}</div>
        } else if (!isLoaded) {
            return <div>Loading ...</div>
        } else {
            return (
                <div>
                    <h1>Hello World React With Class</h1>
                    <ul>
                        {notes.map(note => (
                            <li key={note.id}>
                                <p>{note.title.toUpperCase()}</p>
                                <p>{note.content}</p>
                            </li>
                        ))}
                    </ul>
                </div>
            )
        }
    }
}

export default AppClass;
