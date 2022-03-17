export class TrainModel {
    id;
    manufacturer;
    model;
    year;
    type;
    carries;

    constructor(data = {}) {
        this.id = data.id;
        this.manufacturer = data.manufacturer;
        this.model = data.model;
        this.year = data.year;
        this.type = data.type;
        this.carries = data.carries;
    }
}