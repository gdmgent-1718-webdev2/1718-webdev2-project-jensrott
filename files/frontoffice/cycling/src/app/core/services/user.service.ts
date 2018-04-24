import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';
/*
import { HttpClientModule } from '@angular/common/http';
import { HttpModule } from '@angular/http';
*/

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';

import { User } from '../models/user';
import { environment } from '../../../environments/environment';

@Injectable()
export class UserService {

  private _apiEndPointGet = environment.CyclingAPI.url + environment.CyclingAPI.endPoints.get;
  private _apiEndPointGetSpecific = environment.CyclingAPI.url + environment.CyclingAPI.endPoints.getspecific;
  private _apiEndPointPost = environment.CyclingAPI.url + environment.CyclingAPI.endPoints.post;

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'enctype': 'multipart/form-data',
      'X-Requested-With': 'XMLHttpRequest'
    })
  };

  // Login, register with laravel
  constructor(private _httpClient: HttpClient) { }

  getUsers(): Observable<Array<User>> {
  return this._httpClient.get<Array<User>>(this._apiEndPointGet);
  }

  getProjectsById(id: number): Observable<User> {
    const url = `${this._apiEndPointGetSpecific}${id}`;
    return this._httpClient.get<User>(`${ url }`);
  }

  addUser(user: User) {
    console.log(user);
    return this._httpClient.post<User>(this._apiEndPointPost, user, this.httpOptions);
  }
}
