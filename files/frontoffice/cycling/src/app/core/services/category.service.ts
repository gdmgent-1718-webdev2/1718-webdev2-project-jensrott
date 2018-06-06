import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';

import { Observable } from 'rxjs/Observable';

import { Category } from '../models/category';
import { environment } from '../../../environments/environment';

@Injectable()
export class CategoryService {

  private _apiEndPointGet = environment.CyclingAPI.url + environment.CyclingAPI.categoriesEndPoints.get;
  private _apiEndPointGetSpecific = environment.CyclingAPI.url + environment.CyclingAPI.categoriesEndPoints.getspecific;
  private _apiEndPointPost = environment.CyclingAPI.url + environment.CyclingAPI.categoriesEndPoints.post;

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'enctype': 'multipart/form-data',
      'X-Requested-With': 'XMLHttpRequest'
    })
  };

  constructor(private _httpClient: HttpClient) { }

    getCategories(): Observable<Array<Category>> {
      return this._httpClient.get<Array<Category>>(this._apiEndPointGet);
    }
    getCategoriesById(id: number): Observable<Category> {
      const url = `${this._apiEndPointGetSpecific}${id}`;
      return this._httpClient.get<Category>(`${ url }`);
    }
    addCategory(category: Category) {
      console.log(Category); // TODO
      return this._httpClient.post<Category>(this._apiEndPointPost, category, this.httpOptions);
    }

}
