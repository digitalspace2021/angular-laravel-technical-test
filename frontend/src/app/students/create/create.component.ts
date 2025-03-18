import { Component } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  ReactiveFormsModule,
  Validators,
} from '@angular/forms';
import { StudentsService } from '../../services/students.service';
import { RouterLink } from '@angular/router';
import { AlertComponent } from '../../utils/alert/alert.component';

@Component({
  selector: 'app-create',
  standalone: true,
  imports: [RouterLink, ReactiveFormsModule, RouterLink, AlertComponent],
  templateUrl: './create.component.html',
  styleUrl: './create.component.css',
})
export class CreateComponent {
  createForm: FormGroup;
  errors: Record<string, string[]> = {};
  hasErrors: boolean = false;
  success: boolean = false;
  constructor(
    private fb: FormBuilder,
    private studentService: StudentsService
  ) {
    this.createForm = this.fb.group({
      name: ['', [Validators.required, Validators.minLength(3)]],
      lastName: ['', [Validators.required, Validators.minLength(3)]],
      email: ['', [Validators.required, Validators.email]],
      age: [
        '',
        [
          Validators.required,
          Validators.min(18),
          Validators.max(99),
          Validators.pattern('^[0-9]*$'),
        ],
      ],
      identification: [
        '',
        [
          Validators.required,
          Validators.pattern('^[0-9]*$'),
          Validators.minLength(9),
          Validators.maxLength(12),
        ],
      ],
    });
  }
  addStudent() {
    if (this.createForm.valid) {
      this.studentService
        .addStudent({
          name: this.createForm.value.name,
          last_name: this.createForm.value.lastName,
          email: this.createForm.value.email,
          age: this.createForm.value.age,
          identification: this.createForm.value.identification,
        })
        .subscribe({
          next: (res) => {
            console.log(res);
          },
          error: (error) => {
            if (error.status === 422) {
              this.errors = error.error.errors;
              this.hasErrors = true;
            }
          },
          complete: () => {
            this.success = true;
            this.createForm.reset();
          },
        });
    }
  }
}
