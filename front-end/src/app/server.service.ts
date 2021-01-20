import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpErrorResponse } from '@angular/common/http';
import { Mark } from './models/Mark';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-Type': 'application/json'
  })
};

@Injectable({
  providedIn: 'root'
})
export class ServerService {

  constructor(private http: HttpClient) {}

  getStudentMeansData(){
    return this.http.get<Object[]>('/students');
  }

  fetchStudentMarks(){
    return this.http.post<Object[]>('/students', [], httpOptions);
  }

}
