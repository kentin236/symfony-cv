import React, {useEffect, useState} from 'react';
import AppClass from "./AppClass";

function App() {
    const [notes, setNotes] = useState([]);
    const [isLoaded, setIsLoaded] = useState(false);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetch('http://127.0.0.1:8000/api/note')
            .then(res => res.json())
            .then(
                (result) => {
                    setNotes(result)
                    setIsLoaded(true)
                },
                (error) => {
                    setIsLoaded(true);
                    setError(error);
                }
            )
    }, []);

    if (error) {
        return <div>Error: {error.message}</div>
    } else if (!isLoaded) {
        return <div>Loading ...</div>
    } else {
        return (
            <div>
                <h1>Hello World React</h1>
                <ul>
                    {notes.map(note => (
                        <li key={note.id}>
                            <p>{note.title.toUpperCase()}</p>
                            <p>{note.content}</p>
                        </li>
                    ))}
                </ul>
                <AppClass/>
            </div>
        )
    }
}

export default App;