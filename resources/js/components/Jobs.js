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

        if (null == this.state.jobs) {
            console.log('Nothing to show');
            return (<div>Nothing to show</div>)
        }

        console.log('Mapping JSON');
        const jobsMap = this.state.jobs.map((job) => (
            <div className="card">
                <div className="card-body">
                    <h5 className="card-title">
                        {job.id}
                        <div className="float-right">
                            Float right on all viewport sizes
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

    fetchJobs() {
        console.log('Calling API');
        axios.get('api/jobs')
            .then(response => {
                this.setState({jobs: response.data, isFetching: false})
            })
            .catch(e => {
                console.error(e);
                this.setState({...this.state, isFetching: false});
            });
        console.log('Finished calling the API');
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
