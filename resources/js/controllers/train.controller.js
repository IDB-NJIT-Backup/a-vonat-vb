export class TrainController {
    static #instance;

    url = '/api/trains';

    headers = {'Content-Type': 'application/json'};

    http = {
        post: async (url, body) => {
            return new Promise(resolve => fetch(
                url, {headers: this.headers, method: 'post', body: JSON.stringify(body)}).then(resolve)
            );
        },
        get: async (url) => {
            return new Promise(resolve => fetch(
                url, {headers: this.headers, method: 'get'}).then(res => res.json()).then(resolve)
            );
        },
        put: async (url, body) => {
            return new Promise(resolve => fetch(
                url, {headers: this.headers, method: 'put', body: JSON.stringify(body)}).then(resolve)
            );
        },
        delete: async (url) => {
            return new Promise(resolve => fetch(
                url, {headers: this.headers, method: 'delete'}).then(resolve)
            );
        }
    }

    items = [];

    static getInstance() {
        if (!this.#instance) {
            return new TrainController();
        }

        return TrainController.#instance;
    }

    async create(data) {
        return this.http.post(this.url, data);
    }

    async read(id) {
        let url = this.url;

        if (id) {
            url += `/${id}`;
        }

        return this.http.get(url);
    }

    async update(id, data) {
        return this.http.put(this.url + `/${id}`, data);
    }

    async delete(id) {
        return this.http.delete(this.url + `/${id}`);
    }
}