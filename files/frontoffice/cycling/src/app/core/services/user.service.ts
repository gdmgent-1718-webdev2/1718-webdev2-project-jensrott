import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';

import { Observable } from 'rxjs/Observable';

import { User } from '../models/user';
import { environment } from '../../../environments/environment';
import {AuthenticationService} from '../../core/services/authentication.service';

@Injectable()
export class UserService {

  private _apiEndPointGet = environment.CyclingAPI.url + environment.CyclingAPI.usersEndPoints.get;
  private _apiEndPointGetSpecific = environment.CyclingAPI.url + environment.CyclingAPI.usersEndPoints.getspecific;
  private _apiEndPointPost = environment.CyclingAPI.url + environment.CyclingAPI.usersEndPoints.post;
  private _apiEndPointRegister = environment.CyclingAPI.url + environment.CyclingAPI.authEndPoints.register;

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'enctype': 'multipart/form-data',
      'X-Requested-With': 'XMLHttpRequest'
    })
  };

  // Login, register with laravel
  constructor(
    private _httpClient: HttpClient,
    private authenticationService: AuthenticationService
  ) { }

  getUsers(): Observable<Array<User>> {
  return this._httpClient.get<Array<User>>(this._apiEndPointGet);
  }


  getUsersById(id: number): Observable<User> {
    const url = `${this._apiEndPointGetSpecific}${id}`;
    return this._httpClient.get<User>(`${ url }`);
  }

  addUser(user: User) {
    console.log(user);
    return this._httpClient.post<any>(this._apiEndPointRegister, user, this.httpOptions)
      .map(res => {
        // login successfull if there is a jwt token in the response
        if (res && res.access_token) {
          // store user details and jwt token in local storage to keep user logged in between page refreshes
          localStorage.setItem('currentUser', JSON.stringify(res)); // Token + current User details are stored as a JSON string
        }
        this.authenticationService.getCurrentUserId();
        return res;
      });
  }
}
