import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';

import { Observable } from 'rxjs/Observable';

import { Bid } from '../models/bid';
import { environment } from '../../../environments/environment';

@Injectable()
export class BidService {

  private _apiEndPointGet = environment.CyclingAPI.url + environment.CyclingAPI.bidsEndPoints.get;
  private _apiEndPointGetSpecific = environment.CyclingAPI.url + environment.CyclingAPI.bidsEndPoints.getspecific;
  private _apiEndPointPost = environment.CyclingAPI.url + environment.CyclingAPI.bidsEndPoints.post;

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'enctype': 'multipart/form-data',
      'X-Requested-With': 'XMLHttpRequest'
    })
  };

  constructor(private _httpClient: HttpClient) { }



getBids(): Observable<Array<Bid>> {
  return this._httpClient.get<Array<Bid>>(this._apiEndPointGet);
  }

  getBidsById(id: number): Observable<Bid> {
    const url = `${this._apiEndPointGetSpecific}${id}`;
    return this._httpClient.get<Bid>(`${ url }`);
  }

  addBid(bid: Bid) {
    console.log(bid); // TODO
    return this._httpClient.post<Bid>(this._apiEndPointPost, bid, this.httpOptions);
  }
}
