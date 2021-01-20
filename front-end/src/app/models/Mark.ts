export class Mark {

    id: number;
    mark: number
    student_id: number;
    subject_id: number;
    
    constructor(id: number, mark: number, student_id: number, subject_id:number){
        this.id = id;
        this.mark = mark;
        this.student_id = student_id;
        this.subject_id = subject_id;
    }
}