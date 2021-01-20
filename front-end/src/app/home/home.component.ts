import { Component, OnDestroy } from '@angular/core';
import { ServerService } from '../server.service';
import { Subscription, Observable } from 'rxjs';
import { FormBuilder, FormGroup, Validators, FormArray, FormControl } from '@angular/forms';
import { Mark } from '../models/Mark';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnDestroy{

  studData: any[];
  headers: string[];
  serverSub: Subscription;
  response$;


  constructor(private server: ServerService){
    this.response$ = this.server.fetchStudentMarks();
  }

  loadTable(){
    this.serverSub = this.response$.subscribe((response: any[]) => {
      if(response != null){
        this.headers = Object.keys(response[0]);
        this.studData = response;
      }
    });
  }

  ngOnDestroy() {
    if (this.serverSub != null)
      this.serverSub.unsubscribe();
  }

}
