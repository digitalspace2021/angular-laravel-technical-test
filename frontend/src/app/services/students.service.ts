import { HttpClient, HttpResponse } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { environment } from '../../config/environments/environment';

@Injectable({
  providedIn: 'root',
})
export class StudentsService {
  private api = `${environment.apiUrl}:${environment.port}/api`;

  constructor(private http: HttpClient) {}

  getStudents(search: string, page: string): Observable<any> {
    return this.http.get(`${this.api}/student?search=${search}&page=${page}`);
  }

  getStudent(id: string): Observable<HttpResponse<any>> {
    return this.http.get<any>(`${this.api}/student/${id}`, {
      observe: 'response',
    });
  }

  addStudent(student: {
    name: string;
    last_name: string;
    email: string;
    age: number;
    identification: string;
  }): Observable<HttpResponse<any>> {
    return this.http.post<any>(`${this.api}/student`, student, {
      observe: 'response',
    });
  }

  updateStudent(
    id: string,
    student: {
      name: string;
      last_name: string;
      email: string;
      age: number;
      identification: string;
    }
  ): Observable<HttpResponse<any>> {
    return this.http.put<any>(`${this.api}/student/${id}`, student, {
      observe: 'response',
    });
  }

  deleteStudent(id: string) {
    return this.http.delete(`${this.api}/student/${id}`);
  }
}
