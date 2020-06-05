import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

class Jobs extends Component {
    constructor(props) {
        super(props);
        this.state = {
            isFetching: false,
            jobs: []
        };

    }

    render() {
        console.log('Rendering layout...');
        if (null === this.state.jobs || 0 === this.state.jobs.length) {
            return (
                <div className="container-fluid">
                    <div className="alert alert-info">No active jobs at the moment.</div>
                </div>);
        }

        console.log('Mapping JSON');
        const jobsMap = this.state.jobs.map((job) => (
            <div className="card">
                <div className="card-body">
                    <h5 className="card-title">
                        {job.id}
                        <div className="float-right">
                            Status:
                        </div>
                    </h5>
                    <h6 className="card-subtitle mb-3 text-muted">{job.created_at}</h6>
                    <h6 className="card-subtitle mb-3 text-muted">{job.available_at}</h6>
                    <p className="card-text">{job.created_at}</p>
                </div>
            </div>
        ));

        return (<div>{jobsMap}</div>);
    }

    loadingDisplay() {
        if (true === this.state.isFetching) {
            return (
                <div className="spinner-border" role="status">
                    <span className="sr-only">Loading...</span>
                </div>);
        }
    }

    fetchJobs() {
        this.setState({isFetching: true});
        axios.get('api/jobs')
            .then(response => {
                if (response.status === 200) {
                    console.log('Found an active job');
                    this.setState({jobs: response.data, isFetching: false})
                } else {
                    this.setState({jobs: null});
                    console.log('No active jobs returned');
                }
            })
            .catch(e => {
                console.error(e);
                this.setState({...this.state, isFetching: false});
            });
    }

    componentWillUnmount() {
        clearInterval(this.intervalID);
    }

    componentDidMount() {
        this.fetchJobs()
        this.intervalID = setInterval((e) => {
            this.fetchJobs()
        }, 5000);
    }
}

export default Jobs;

if (document.getElementById('jobs')) {
    ReactDOM.render(<Jobs/>, document.getElementById('jobs'));
}
