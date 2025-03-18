import { Routes } from '@angular/router';
import { StudentsComponent } from './students/students.component';
import { CreateComponent } from './students/create/create.component';
import { EditComponent } from './students/edit/edit.component';

export const routes: Routes = [
  { path: 'students', component: StudentsComponent },
  { path: 'students-create', component: CreateComponent },
  { path: 'students-edit/:id', component: EditComponent },
  { path: '', redirectTo: 'students', pathMatch: 'full' },
];
